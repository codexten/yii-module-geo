<?php

use codexten\yii\modules\country\helpers\CountryHelper;
use kartik\select2\Select2;
use yii\web\View;

/* @var $this View */
?>

<?= $form->field($model, 'country_id')
    ->widget(Select2::class, [
        'data' => CountryHelper::getNamesById(),
    ])
?>

<?= $form->field($model, 'code') ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'abbreviation') ?>
