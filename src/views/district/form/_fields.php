<?php

use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\ZoneGroup;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model District */
/* @var $form ActiveForm */
?>

<?= $this->render('@moduleGeo/views/zone/form/_base', compact(['model', 'form'])) ?>

<?= $form->field($model->zoneGroup, 'type')->textInput(['value' => ZoneGroup::TYPE_STATE]) ?>

