<?php

namespace codexten\yii\modules\geo\helpers;

class ZoneHelper
{
    const MODEL_CLASS = \codexten\yii\modules\geo\models\Zone::class;

    /**
     * @return array
     * @deprecated
     */
    public static function getNames()
    {
        return self::getZoneNamesByCode();
    }

    public static function getZoneNamesByCode()
    {
        $items = [];
        foreach (self::getZones() as $model) {
            $items[$model->code] = $model->name;
        }

        return $items;
    }

    /**
     * @param null $type
     *
     * @return array|\codexten\yii\modules\geo\models\Zone[]
     */
    public static function getZones($type = null)
    {
        $modelClass = static::MODEL_CLASS;
        $query = $modelClass::find();
        if ($type) {
            $query->andWhere(['type' => $type]);
        }

        return $query->all();
    }

    public static function getZoneNamesById($scope = null)
    {
        $items = [];
        foreach (self::getZones($scope) as $model) {
            $items[$model->id] = $model->name;
        }

        return $items;
    }
}
