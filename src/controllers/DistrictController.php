<?php


namespace codexten\yii\modules\geo\controllers;


use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\Province;
use Yii;

class DistrictController extends BaseZoneController
{
    public $modelClass = District::class;

    public function actionDistrict()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getDistrictList($cat_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function getDistrictList($cat_id)
    {
        $stateCode = Province::find()->select('code')->andWhere(['id' => $cat_id])->one();

        $subCategory = District::find()
            ->select([District::tableName().'.id', 'name'])
            ->joinWith(['zoneGroup as zoneGroup'])
            ->andWhere(['group_code' => $stateCode['code']])
            ->asArray()->all();
        return $subCategory;
    }

}
