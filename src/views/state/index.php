<?php

use codexten\yii\modules\country\helpers\CountryHelper;
use codexten\yii\web\widgets\IndexPage;
use kartik\grid\EnumColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel */

$this->title = Yii::t('app', 'States');
?>

<?php $page = IndexPage::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('main-actions') ?>

<?= $page->renderButton('create', 'create', ['class' => ['btn-success']]) ?>

<?php $page->endContent() ?>

<?php $page->beginContent('table') ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => EnumColumn::class,
            'attribute' => 'country_id',
            'enum' => CountryHelper::getNamesById(),
        ],
        'code',
        'name',
        'abbreviation',
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'template' => '{update} {delete}',
        ],
    ],
]); ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
