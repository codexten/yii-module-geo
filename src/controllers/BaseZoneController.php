<?php

namespace codexten\yii\modules\geo\controllers;

use codexten\yii\web\CrudController;

/**
 * ZoneController implements the CRUD actions for Zone model.
 */
abstract class BaseZoneController extends CrudController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }

}
