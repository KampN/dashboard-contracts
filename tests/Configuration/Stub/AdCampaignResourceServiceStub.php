<?php

namespace Kampn\Dashboard\Tests\Configuration\Stub;

use Kampn\Dashboard\Contract\Enum\ServiceTypeEnum;
use Kampn\Dashboard\Contract\Resource\AdCampaignResource;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\Query\SQL\ResourceSQLQueryBuilderInterface;
use Kampn\Dashboard\Service\Query\SQL\ResourceSQLQueryBuilderTrait;
use Kampn\Dashboard\Service\ResourceServiceTrait;

class AdCampaignResourceServiceStub implements AdCampaignResource, ResourceSQLQueryBuilderInterface
{

    use ResourceServiceTrait;
    use ResourceSQLQueryBuilderTrait;

    public static function getServiceType() : string
    {
        return ServiceTypeEnum::ROWS;
    }

    public function getPlatform() : string
    {
        return 'foobar';
    }

    public function process(Query $query, array $options = []) : iterable
    {
        return ['test'];
    }

    public function getFieldsDefs() : array
    {
        return [
            self::FIELD_AD_CAMPAIGN_ID => 'c.id',
            self::FIELD_AD_ACCOUNT_ID  => 'c.account_id',
            self::FIELD_DATE           => 's.date',
            self::FIELD_NAME           => 'c.name',
            self::FIELD_STATUS         => 'c.status',
            self::FIELD_START_DATE     => 'c.start_date',
            self::FIELD_END_DATE       => 'c.end_date',
            self::FIELD_COST           => 'coalesce(sum(s.cost), 0)',
            self::FIELD_IMPRESSIONS    => 'coalesce(sum(s.impressions), 0)',
            self::FIELD_CONV_VALUE     => ' coalesce(sum(s.all_conversion_value), 0)',
            self::FIELD_CONVERSIONS    => ' coalesce(sum(s.conversions), 0)',
            self::FIELD_CLICKS         => ' coalesce(sum(s.clicks), 0)',
        ];
    }

    public function getSegmentDefs() : array
    {
        return [
            self::FIELD_AD_ACCOUNT_ID  => [
                self::FIELD_AD_ACCOUNT_ID,
            ],
            self::FIELD_AD_CAMPAIGN_ID => [
                self::FIELD_AD_ACCOUNT_ID,
                self::FIELD_AD_CAMPAIGN_ID,
                self::FIELD_NAME,
                self::FIELD_STATUS,
                self::FIELD_START_DATE,
                self::FIELD_END_DATE,
            ],
            self::FIELD_DATE           => [
                self::FIELD_DATE,
            ],
        ];
    }

    public function getAggDefs() : array
    {
        return [
            self::FIELD_COST,
            self::FIELD_IMPRESSIONS,
            self::FIELD_CONV_VALUE,
            self::FIELD_CONVERSIONS,
            self::FIELD_CLICKS,
        ];
    }

    public function getFrom(Query $query) : string
    {
        return 'from table';
    }


}
