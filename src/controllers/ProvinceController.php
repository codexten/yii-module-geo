<?php

namespace codexten\yii\modules\geo\controllers;

use Yii;
use codexten\yii\modules\geo\models\Province;
use codexten\yii\web\CrudController;

/**
 * ProvinceController implements the CRUD actions for Province model.
 */
class ProvinceController extends CrudController
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
