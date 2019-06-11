<?php

namespace codexten\yii\modules\geo\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
use yii\db\ActiveQuery;

/**
 * Class Zone
 *
 * @property State $state
 * @property ZoneGroup $zoneGroup
 *
 * @package codexten\yii\modules\geo\models
 */
class District extends BaseZone
{
    use SaveRelationsTrait;

    const TYPE_DISTRICT = 'district';
    const TYPE = self::TYPE_DISTRICT;

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
//    public function load($data, $formName = null)
//    {
//        $data['ZoneGroup']['zone_code'] = $data['District']['code'];
//
//        $loaded = parent::load($data, $formName);
//        if ($loaded && $this->hasMethod('loadRelations')) {
//            $this->loadRelations($data);
//        }
//
//        return $loaded;
//    }

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
        return $this->hasOne(ZoneGroup::class, ['zone_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::class, ['code' => 'group_code'])->via('zoneGroup');
    }
}
