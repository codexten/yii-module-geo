<?php

namespace codexten\yii\modules\geo\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use yii\db\ActiveQuery;

/**
 * Class Zone
 *
 * @property ZoneGroup $zoneGroup
 *
 * @package codexten\yii\modules\geo\models
 */
class District extends BaseZone
{
    use SaveRelationsTrait;

    const TYPE_DISTRICT = 'district';

    public $type = self::TYPE_DISTRICT;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['saveRelations'] = [
            'class' => SaveRelationsBehavior::class,
            'relations' => [
                'zoneGroup',
            ],
        ];

        return $behaviors;
    }

    /**
     * {@inheritDoc}
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getZoneGroup()
    {
        return $this->hasOne(ZoneGroup::class, ['zone_code' => 'code']);
    }
}
