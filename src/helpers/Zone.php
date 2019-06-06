<?php

namespace codexten\yii\modules\geo\helpers;

class Zone
{
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
     * @return array|\codexten\yii\modules\geo\models\Zone[]
     */
    public static function getZones($scope = null)
    {
        $query = \codexten\yii\modules\geo\models\Zone::find();
        if ($scope) {
            $query->andWhere(['scope' => $scope]);
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
