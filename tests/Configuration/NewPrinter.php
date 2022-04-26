<?php

namespace Kampn\Dashboard\Tests\Configuration;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\Util\Color;
use SebastianBergmann\Timer\Timer;

class NewPrinter implements ResultPrinter {

	public const PERF_THRESHOLDS = ['fg-red' => 1000, 'fg-yellow' => 200, 'fg-white' => 0];

	protected int $numAssertions = 0;
	protected int $numTests = -1;
	protected int $numTestsRun = 0;

	protected bool $defectListPrinted = false;

	protected ?\Throwable $lastError = null;
	protected bool $hasError = false;
	protected bool $hasLastWarningOrSkipping = false;

	protected Timer $timer;

	public function __construct() {
		$this->timer = new Timer();
		$this->timer->start();
	}

	public function addError(Test $test, \Throwable $t, float $time): void {
		$this->lastError = $t;
		$this->hasError = true;
	}

	public function addWarning(Test $test, Warning $e, float $time): void {
		$this->hasLastWarningOrSkipping = true;
	}

	public function addFailure(Test $test, AssertionFailedError $e, float $time): void {
		$this->lastError = $e;
		$this->hasError = true;
	}

	public function addIncompleteTest(Test $test, \Throwable $t, float $time): void {

	}

	public function addRiskyTest(Test $test, \Throwable $t, float $time): void {
		$this->hasLastWarningOrSkipping = true;
	}

	public function addSkippedTest(Test $test, \Throwable $t, float $time): void {

	}

	public function startTestSuite(TestSuite $suite): void {
		if($this->numTests == -1)
			$this->numTests = \count($suite);
	}

	public function endTestSuite(TestSuite $suite): void {

	}

	public function startTest(Test $test): void {

	}

	public function endTest(Test $test, float $time): void {
		$this->numTestsRun++;

		if($test instanceof TestCase) {
			$this->numAssertions += $test->getNumAssertions();
		} else if($test instanceof PhptTestCase) {
			$this->numAssertions++;
		}

		$color = $this->hasError === false ? 'fg-white' : 'fg-red,bold';
		$this->writeWithColor($color, sprintf('%3d%% ', floor($this->numTestsRun / $this->numTests * 100)), false);

		$describe = \PHPUnit\Util\Test::describe($test);
		$color = ($this->hasLastWarningOrSkipping ? 'fg-yellow,bold' : 'fg-green,bold');
		$color = $this->lastError === null ? $color : 'fg-red';

		$this->writeWithColor($color, implode('#', $describe), false);

		$ms = round($time * 1000);
		foreach(self::PERF_THRESHOLDS as $colour => $threshold) {
			if($ms > $threshold) break;
		}
		$this->writeWithColor($colour, " [{$ms}ms]");

		if($this->lastError) {
			$this->writeBetterException($this->lastError);
		}

		$this->lastError = null;
		$this->hasLastWarningOrSkipping = false;
	}

	public function printResult(TestResult $result): void {
		$duration = $this->timer->stop();
		$this->write(PHP_EOL . $duration->asString() . PHP_EOL);

		$this->printShortDefects($result->errors(), 'error');
		$this->printDefects($result->warnings(), 'warning');
		$this->printShortDefects($result->failures(), 'failure');
		$this->printDefects($result->risky(), 'risky test');

		$this->printDefects($result->notImplemented(), 'incomplete test');
		$this->printDefects($result->skipped(), 'skipped test');

		if(\count($result) === 0) {
			$this->writeWithColor('fg-black, bg-yellow', 'No tests executed!');
			return;
		}

		if($result->wasSuccessful() &&
			$result->allHarmless() &&
			$result->allCompletelyImplemented() &&
			$result->noneSkipped()) {
			$this->writeWithColor('fg-black, bg-green',
				\sprintf('OK (%d test%s, %d assertion%s)', \count($result), (\count($result) === 1)
					? ''
					: 's', $this->numAssertions, ($this->numAssertions === 1) ? '' : 's'));
		} else {
			$color = 'fg-white';

			if($result->wasSuccessful()) {
				$color = 'fg-black, bg-yellow';
				$this->writeWithColor($color, 'OK, but incomplete, skipped, or risky tests!');
			} else {
				$this->write("\n");

				if($result->errorCount()) {
					$color = 'fg-white, bg-red';
					$this->writeWithColor($color, 'ERRORS!');
				} else if($result->failureCount()) {
					$color = 'fg-white, bg-red';
					$this->writeWithColor($color, 'FAILURES!');
				} else if($result->warningCount()) {
					$color = 'fg-black, bg-yellow';
					$this->writeWithColor($color, 'WARNINGS!');
				}
			}

			$this->writeCountString(\count($result), 'Tests', $color, true);
			$this->writeCountString($this->numAssertions, 'Assertions', $color, true);
			$this->writeCountString($result->errorCount(), 'Errors', $color);
			$this->writeCountString($result->failureCount(), 'Failures', $color);
			$this->writeCountString($result->warningCount(), 'Warnings', $color);
			$this->writeCountString($result->skippedCount(), 'Skipped', $color);
			$this->writeCountString($result->notImplementedCount(), 'Incomplete', $color);
			$this->writeCountString($result->riskyCount(), 'Risky', $color);
			$this->writeWithColor($color, '.');
		}
	}

	/**  */

	public function writeBetterException(\Throwable $exception, string $baseColor = 'red'): void {
		// Parse nested exception trace line by line.
		foreach(explode("\n", $exception) as $line) {
			if($exception instanceof ExceptionWrapper && false !== $pos = strpos($line, $exception->getClassName() . ': ')) {
				$whitespace = str_repeat(' ', ($pos += strlen($exception->getClassName())) + 2);

				// Exception name.
				$this->writeWithColorAndTab("bg-$baseColor,fg-white", sprintf(' %s ', substr($line, 0, $pos)), false);
				$this->write(PHP_EOL);

				// Exception message.
				$message = trim(substr($line, $pos + 1));
				$this->writeWithColorAndTab("fg-$baseColor", trim($message));
			} else {
				$line = preg_replace('/^\/symfony\//', '', $line, -1);
				$line = preg_replace('/^\/srv\//', '', $line, -1);
				$this->writeWithColorAndTab("fg-$baseColor", $line);
			}
		}
	}

	protected function printShortDefects(array $errors, $type): void {
		$count = \count($errors);
		if($count == 0) return;

		$this->write(\sprintf("\nThere %s %d %s%s:\n", ($count == 1) ? 'was' : 'were', $count, $type, ($count == 1) ? '' : 's'));

		/** @var TestFailure $defect */
		foreach($errors as $index => $defect) {
			if($index > 100) continue;

			$reflector = new \ReflectionClass(get_class($defect));
			$test = $reflector->getProperty('failedTest');
			$test->setAccessible(true);

			$class = $test->getValue($defect);
			$reflector = new \ReflectionClass(get_class($class));
			$path = preg_replace('/^\/srv\//', '', $reflector->getFileName(), -1);

			$this->write(\sprintf("%s\n", "pu " . implode(' ', [$path, "--filter='{$class->getName()}'"])));
		}
	}

	/**  */

	protected function printDefects(array $defects, string $type): void {
		$count = \count($defects);

		if($count == 0) return;
		if($this->defectListPrinted) $this->write("\n--\n\n");

		$this->write(\sprintf("\nThere %s %d %s%s:\n", ($count == 1) ? 'was' : 'were', $count, $type, ($count == 1) ? '' : 's'));
		$i = 1;

		foreach($defects as $defect) {
			$this->printDefect($defect, $i++);
		}

		$this->defectListPrinted = true;
	}

	protected function printDefect(TestFailure $defect, int $count): void {
		$this->printDefectHeader($defect, $count);
		$this->printDefectTrace($defect);
	}

	protected function printDefectHeader(TestFailure $defect, int $count): void {
		$this->write(\sprintf("%d) %s\n", $count, $defect->getTestName()));
	}

	protected function printDefectTrace(TestFailure $defect): void {
		$e = $defect->thrownException();
		$this->writeBetterException($e, 'yellow');

		while($e = $e->getPrevious())
			$this->write("\nCaused by\n" . $e);
	}

	protected function colorizeTextBox(string $color, string $buffer): string {
		$lines = \preg_split('/\r\n|\r|\n/', $buffer);
		$padding = \max(\array_map('\strlen', $lines));

		$styledLines = [];
		foreach($lines as $line)
			$styledLines[] = Color::colorize($color, \str_pad($line, $padding));

		return \implode(\PHP_EOL, $styledLines);
	}

	protected function writeWithColorAndTab(string $color, string $buffer, bool $lf = true): void {
		$this->write("\t");
		$this->write($this->colorizeTextBox($color, $buffer));
		if($lf) $this->write(\PHP_EOL);
	}

	protected function writeWithColor(string $color, string $buffer, bool $lf = true): void {
		$this->write($this->colorizeTextBox($color, $buffer));
		if($lf) $this->write(\PHP_EOL);
	}

	private function writeCountString(int $count, string $name, string $color, bool $always = false): void {
		static $first = true;

		if($always || $count > 0) {
			$this->writeWithColor($color, \sprintf('%s%s: %d', !$first ? ', ' : '', $name, $count), false);
			$first = false;
		}
	}

	public function write(string $buffer): void {
		if(\PHP_SAPI !== 'cli' && \PHP_SAPI !== 'phpdbg') {
			$buffer = \htmlspecialchars($buffer, \ENT_SUBSTITUTE);
		}

		print $buffer;
	}
}

