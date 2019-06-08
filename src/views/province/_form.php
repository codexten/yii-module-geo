<?php

use codexten\yii\modules\country\helpers\CountryHelper;
use codexten\yii\modules\geo\models\Province;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Province */
?>

<div class="row">
    <div class="col-md-6">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'country_id')
            ->widget(Select2::class, [
                'data' => CountryHelper::getNamesById(),
            ])
        ?>

        <?= $form->field($model, 'code') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'abbreviation') ?>

        <div class="form-group">

            <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end() ?>

    </div>
</div>
