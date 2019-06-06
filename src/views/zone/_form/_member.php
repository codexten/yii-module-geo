<?php

use codexten\yii\modules\geo\models\Zone;
use codexten\yii\modules\geo\models\ZoneMember;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $model Zone */
/* @var $form ActiveForm */
/* @var $this View */

$modelZoneMembers = (empty($model->zoneMembers)) ? [new ZoneMember()] : $model->zoneMembers;
?>

<h4><?= Yii::t('codexten:module:core', 'members') ?></h4>

<?php
DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'min' => 1, // 0 or 1 (default 1)
    'limit' => 10, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelZoneMembers[0],
    'formId' => $form->id,
    'formFields' => [
        'id',
        'code',
    ],
]); ?>

<div class="row container-items">

    <?php foreach ($modelZoneMembers as $index => $modelZoneMember): ?>

        <div class="col-md-6 item">
            <div class="row">
                <div class="col-md-10">
                    <div class="hidden">

                        <?= $form->field($modelZoneMember, "[{$index}]id")->hiddenInput() ?>

                    </div>

                    <?= $this->render("_member/_field_{$model->type}_code", [
                        'index' => $index,
                        'model' => $modelZoneMember,
                        'form' => $form,
                    ]) ?>

                </div>
                <div class="cold-md-2">
                    <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                class="glyphicon glyphicon-minus"></i></button>
                </div>
            </div>
        </div>

    <?php endForeach; ?>

</div>
<div class="row">
    <div class="pull-right">
        <div class="col-md-4">
            <button type="button" class="add-item btn btn-success btn-xs"><i
                        class="glyphicon glyphicon-plus"></i></button>
        </div>
    </div>
</div>
<?php DynamicFormWidget::end(); ?>
