<?php

namespace Kampn\Dashboard\Contract\Enum;

class OperatorEnum {

    public const EQUAL = '=';
    public const DIFFERENT = '!=';

    public const IN = 'in';
    public const NOT_IN = 'nin';

    public const LIKE = 'like';
    public const NOT_LIKE = 'nlike';

    public const GREATER_THAN = '>';
    public const GREATER_OR_EQUAL_THAN = '>=';
    public const LOWER_THAN = '<';
    public const LOWER_OR_EQUAL_THAN = '<=';

    public const BETWEEN = 'between';
    public const NOT_BETWEEN = 'not between';

}
