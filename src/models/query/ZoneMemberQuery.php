<?php

namespace codexten\yii\modules\geo\models\query;

use codexten\yii\modules\geo\models\ZoneMember;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\codexten\yii\modules\geo\models\ZoneMember]].
 *
 * @see \codexten\yii\modules\geo\models\ZoneMember
 */
class ZoneMemberQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ZoneMember[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ZoneMember|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
