<?php

use codexten\yii\modules\geo\helpers\StateHelper;
use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\ZoneGroup;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model District */
/* @var $form ActiveForm */

$zoneGroup = $model->zoneGroup ?: new ZoneGroup(['type' => ZoneGroup::TYPE_STATE]);
?>
<?= Html::errorSummary($model) ?>

<?= $this->render('@moduleGeo/views/zone/form/_base', compact(['model', 'form'])) ?>


<?= $form->field($zoneGroup, 'group_code')
    ->widget(Select2::class, [
        'data' => StateHelper::getStateNamesByCode(),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

<div class="hidden">

    <?= $form->field($zoneGroup, 'type')->hiddenInput() ?>
    <?= $form->field($zoneGroup, 'id')->hiddenInput() ?>

</div>
