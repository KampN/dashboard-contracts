<?php

namespace Kampn\Dashboard\Contract\Interfaces;

interface ResourceInterface {

    public const FIELD_NAME = 'name';
    public const FIELD_DESCRIPTION = 'description';
    public const FIELD_IS_SEGMENT = 'is_segment';
    public const FIELD_TYPE = 'type';
    public const FIELD_SELECTABLE = 'selectable';
    public const FIELD_OPERATORS = 'operators';

    public function getSupportSources(): array;

    public function getFields(): array;

    public function getResourceName(): string;

}
