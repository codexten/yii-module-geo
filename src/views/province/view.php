<?php

use codexten\yii\web\widgets\Page;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model codexten\yii\modules\geo\models\Province */

$this->title = $model->name;
?>

<?php $page = Page::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('content') ?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'country_id',
        'code',
        'name',
        'abbreviation',
    ],
]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
