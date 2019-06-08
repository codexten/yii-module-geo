<?php

use codexten\yii\modules\geo\helpers\Zone;
use codexten\yii\modules\geo\models\ZoneMember;

/* @var $model ZoneMember */
/* @var $index integer */
?>

<?= $form->field($model, "[{$index}]code")->dropDownList(Zone::getNames()) ?>
