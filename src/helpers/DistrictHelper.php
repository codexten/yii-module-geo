<?php


namespace codexten\yii\modules\geo\helpers;


use codexten\yii\modules\geo\models\District;

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


}
