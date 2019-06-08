<?php

namespace codexten\yii\modules\geo\models\query;

/**
 * This is the ActiveQuery class for [[\codexten\yii\modules\geo\models\Province]].
 *
 * @see \codexten\yii\modules\geo\models\Province
 */
class ProvinceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \codexten\yii\modules\geo\models\Province[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \codexten\yii\modules\geo\models\Province|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
