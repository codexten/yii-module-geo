<?php

namespace codexten\yii\modules\geo\models\query;

/**
 * This is the ActiveQuery class for [[\codexten\yii\modules\geo\models\ZoneGroup]].
 *
 * @see \codexten\yii\modules\geo\models\ZoneGroup
 */
class ZoneGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \codexten\yii\modules\geo\models\ZoneGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \codexten\yii\modules\geo\models\ZoneGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
