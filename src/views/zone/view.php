<?php

use codexten\yii\web\widgets\Page;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model codexten\yii\modules\geo\models\Zone */

$this->title = $model->name;
?>

<?php $page = Page::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('content') ?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'code',
        'name',
        'type',
        'scope',
    ],
]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
