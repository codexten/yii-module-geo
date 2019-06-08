<?php

use codexten\yii\modules\geo\models\Zone;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Zone */
?>

<div class="row">
    <div class="col-md-6">

        <?php $form = ActiveForm::begin() ?>

        <?= $this->render('form/_fields', compact(['model', 'form'])) ?>

        <div class="form-group">

            <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('codexten:module:core', 'Create') : Yii::t('codexten:module:core',
                    'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end() ?>

    </div>
</div>
