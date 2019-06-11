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

    /**
     * {@inheritDoc}
     */
    public function beforeSave($insert)
    {
        $this->type = self::TYPE_DISTRICT;

        return parent::beforeSave($insert);
    }
}
