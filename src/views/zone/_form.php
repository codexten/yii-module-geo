<?php

use codexten\yii\modules\geo\models\Zone;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Zone */
?>

<div class="row">
    <div class="col-md-6">

        <?php $form = ActiveForm::begin() ?>

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
            <div class="col-md-6">

                <?= $form->field($model, 'scope')
                    ->widget(Select2::class, [
                        'data' => Zone::scopes(),
                        'language' => 'de',
                        'options' => ['placeholder' => Yii::t('codexten:module:locale', 'Select scope')],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]); ?>

            </div>
        </div>

        <?= $this->render('_form/_member', compact(['model', 'form'])) ?>

        <div class="form-group">

            <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('codexten:module:core', 'Create') : Yii::t('codexten:module:core',
                    'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end() ?>

    </div>
</div>
