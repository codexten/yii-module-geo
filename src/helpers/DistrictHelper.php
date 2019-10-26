<?php


namespace codexten\yii\modules\geo\helpers;


use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\Province;

/**
 * Class DistrictHelper
 *
 * @package codexten\yii\modules\geo\helpers
 * @method District[] getZones()
 */
class DistrictHelper extends ZoneHelper
{
    const MODEL_CLASS = District::class;

    public static function getDistrictFullNameById()
    {
        $items = [];
        foreach (self::getZones(District::TYPE_DISTRICT) as $district) {
            $items[$district->id] = $district->fullName;
        }

        return $items;
    }

    /**
     * @param $state_id
     * @return array|District[]|\codexten\yii\modules\geo\models\Zone[]
     */
    public static function getDistricts($state_id)
    {
        $stateCode = Province::find()->select('code')->andWhere(['id' => $state_id])->one();

        $states = District::find()
            ->select([District::tableName().'.id', 'name'])
            ->joinWith(['zoneGroup as zoneGroup'])
            ->andWhere(['group_code' => $stateCode['code']])
            ->asArray()->all();
        return $states;
    }

}
