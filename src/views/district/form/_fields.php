<?php

use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\ZoneGroup;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model District */
/* @var $form ActiveForm */

$zoneGroup = $model->zoneGroup ?: new ZoneGroup(['type' => ZoneGroup::TYPE_STATE]);
?>

<?= $this->render('@moduleGeo/views/zone/form/_base', compact(['model', 'form'])) ?>

<?= $form->field($zoneGroup, 'type')->hiddenInput() ?>


