<?php


namespace codexten\yii\modules\geo\controllers;


use codexten\yii\modules\geo\models\search\ProvinceSearch;

class StateController extends ProvinceController
{
    /**
     * {@inheritDoc}
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['newSearchModel'] = function () {
            $model = new ProvinceSearch();

            return $model;
        };

        return $actions;
    }
}
