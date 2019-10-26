<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\modules\geo\helpers\DistrictHelper;
use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\Province;
use codexten\yii\modules\geo\models\search\ProvinceSearch;
use codexten\yii\modules\geo\models\State;
use Yii;

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

    /**
     * @return array
     */
    public function actionState()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $state_id = $parents[0];
                $out = DistrictHelper::getDistricts($state_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}
