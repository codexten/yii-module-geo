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
    public $type = null;

    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere([Zone::tableName() . '.type' => $this->type]);
        }

        return parent::prepare($builder);
    }

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
