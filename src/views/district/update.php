<?php

use codexten\yii\modules\geo\models\District;
use codexten\yii\web\widgets\UpdatePage;

/* @var $this yii\web\View */
/* @var $model District */

$this->title = Yii::t('app', 'Update District: {nameAttribute}', [
    'nameAttribute' => '' . $model->name,
]);
?>
<?php $page = UpdatePage::begin() ?>

<?php $page->beginContent('form') ?>

<?= $this->render('_form', ['model' => $model]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
