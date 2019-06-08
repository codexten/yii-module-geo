<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\modules\geo\models\Province;
use codexten\yii\web\CrudController;

/**
 * ProvinceController implements the CRUD actions for Province model.
 */
abstract class BaseProvinceController extends CrudController
{
    public $modelClass = Province::class;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }

}
