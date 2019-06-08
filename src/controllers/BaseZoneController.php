<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\modules\geo\models\Zone;
use codexten\yii\web\CrudController;
use Yii;

/**
 * ZoneController implements the CRUD actions for Zone model.
 */
abstract class BaseZoneController extends CrudController
{
    public $modelClass = Zone::class;

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
