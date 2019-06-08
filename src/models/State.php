<?php

namespace codexten\yii\modules\geo\models;

/**
 * Class Province
 *
 * @package codexten\yii\modules\geo\models
 */
class State extends BaseProvince
{
    const TYPE_DISTRICT = 'district';

    public $type = self::TYPE_DISTRICT;

//    public function getDistricts()
//    {
//        return $this->
//    }
}
