<?php

use codexten\yii\modules\geo\models\Zone;
use codexten\yii\web\widgets\IndexPage;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel */

$this->title = Yii::t('codexten:module:core', 'Zones');

$createButtonDropdownItems = [];
foreach (Zone::types() as $type => $label) {
    $createButtonDropdownItems[] = [
        'label' => Yii::t('codexten:module:core', 'Zone consisting of {label}', ['label' => $label]),
        'url' => ['create', 'type' => $type],
    ];
}
?>

<?php $page = IndexPage::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('main-actions') ?>

<?= $page->renderSuccessButtonDropdown(Yii::t('codexten:module:core', 'Create'), $createButtonDropdownItems) ?>

<?php $page->endContent() ?>

<?php $page->beginContent('table') ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'code',
        'name',
        'type',
        'scope',
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'template' => '{update} {delete}',
        ],
    ],
]); ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
