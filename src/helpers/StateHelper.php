<?php


namespace codexten\yii\modules\geo\helpers;


use codexten\yii\modules\geo\models\State;

class StateHelper extends ProvinceHelper
{
    public static function getStateNamesByCode()
    {
        $items = [];
        $models = State::find()->all();
        foreach ($models as $model) {
            $items[$model->code] = $model->name;
        }

        return $items;
    }

}
