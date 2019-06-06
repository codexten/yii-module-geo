<?php

use codexten\yii\modules\geo\models\ZoneMember;
use codexten\yii\modules\country\helpers\Country;

/* @var $model ZoneMember */
/* @var $index integer */
?>

<?= $form->field($model, "[{$index}]code")->dropDownList(Country::getNames(), ['prompt' => ''])->label('') ?>
