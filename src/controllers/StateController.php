<?php


namespace codexten\yii\modules\geo\controllers;


use codexten\yii\modules\geo\models\search\ProvinceSearch;
use codexten\yii\modules\geo\models\State;

class StateController extends BaseProvinceController
{
    public $modelClass = State::class;

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
