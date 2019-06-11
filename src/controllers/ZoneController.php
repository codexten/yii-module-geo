<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\modules\geo\models\Zone;

/**
 * ZoneController implements the CRUD actions for Zone model.
 */
class ZoneController extends BaseZoneController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['create']['loadDefaultValues'] = function ($model) {
            /* @var $model Zone */
            $model->type = Yii::$app->request->get('type');
        };

        return $actions;
    }
}
