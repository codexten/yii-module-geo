<?php

use codexten\yii\modules\geo\models\Zone;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Zone */
/* @var $form ActiveForm */
?>

<div class="row">
    <div class="col-md-6">

        <?= $form->field($model, 'type')
            ->textInput(['disabled' => true]) ?>

    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'code')
            ->textInput([
                'disabled' => !$model->isNewRecord,
            ]) ?>

    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'name') ?>

    </div>
</div>
