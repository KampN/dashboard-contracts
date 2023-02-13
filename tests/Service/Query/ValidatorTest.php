<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use DateTime;
use DateTimeInterface;
use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Service\Exception\QueryException;
use Kampn\Dashboard\Service\Query\FiltersEncoder;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\Query\Validator;
use Kampn\Dashboard\Tests\Configuration\Stub\AdCampaignResourceServiceStub;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidate() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE   => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS   => ['date'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS    => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'cost',
                    FilterConstant::OPERATOR => OperatorEnum::GREATER_THAN,
                    FilterConstant::VALUES   => [0],
                ],
            ]),
        ]);

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function subject() : Validator
    {
        return new Validator();
    }

    public function testValidateWhenSegmentInvalid() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['riri', 'fifi', 'loulou'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Missing segment riri in resource');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function testValidateWhenFilterOperandInvalid() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['date'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS  => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'yolo',
                    FilterConstant::OPERATOR => OperatorEnum::LOWER_THAN,
                    FilterConstant::VALUES   => [0],
                ],
            ]),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Invalid field yolo in filter');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function testValidateWhenFilterOperatorInvalid() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['date'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS  => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'cost',
                    FilterConstant::OPERATOR => OperatorEnum::NOT_LIKE,
                    FilterConstant::VALUES   => [0],
                ],
            ]),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Invalid operator like for field cost in filter');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function testValidateWhenFilterValuesInvalid() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['date'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS  => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'cost',
                    FilterConstant::OPERATOR => OperatorEnum::GREATER_THAN,
                    FilterConstant::VALUES   => 0,
                ],
            ]),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Invalid values for field cost in filter');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function testValidateWhenMissingStartDate() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['date'],
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS  => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'cost',
                    FilterConstant::OPERATOR => OperatorEnum::GREATER_THAN,
                    FilterConstant::VALUES   => 0,
                ],
            ]),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Missing start date in query');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }

    public function testValidateWhenMissingEndDate() : void
    {
        $resource = new AdCampaignResourceServiceStub();
        $query    = Query::build([
            QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
            QueryConstant::SEGMENTS => ['date'],
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::FILTERS  => FiltersEncoder::encode([
                [
                    FilterConstant::OPERAND  => 'cost',
                    FilterConstant::OPERATOR => OperatorEnum::GREATER_THAN,
                    FilterConstant::VALUES   => 0,
                ],
            ]),
        ]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Missing end date in query');

        $this->subject()->validate($resource, $query);
        $this->assertTrue(true);
    }
}
