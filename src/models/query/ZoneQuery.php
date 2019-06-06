<?php

namespace codexten\yii\modules\geo\models\query;

use codexten\yii\modules\geo\models\Zone;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\codexten\yii\modules\geo\models\Zone]].
 *
 * @see \codexten\yii\modules\geo\models\Zone
 */
class ZoneQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Zone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Zone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
