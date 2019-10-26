<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\Province;
use Yii;

class DistrictController extends BaseZoneController
{
    public $modelClass = District::class;

    /**
     * @return array
     */
    public function actionDistrict()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $id = $parents[0];
                $out = self::getDistrictList($id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    /**
     * @param $id
     * @return array|District[]|\codexten\yii\modules\geo\models\Zone[]
     */
    public function getDistrictList($id)
    {
        $stateCode = Province::find()->select('code')->andWhere(['id' => $id])->one();

        $districtList = District::find()
            ->select([District::tableName().'.id', 'name'])
            ->joinWith(['zoneGroup as zoneGroup'])
            ->andWhere(['group_code' => $stateCode['code']])
            ->asArray()->all();
        return $districtList;
    }

}
