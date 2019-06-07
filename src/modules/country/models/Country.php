<?php

namespace codexten\yii\modules\geo\modules\country\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;

class Country extends \codexten\yii\modules\country\models\Country
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['saveRelations'] = [
            'class' => SaveRelationsBehavior::class,
            'relations' => [
                'productTranslations',
            ],
        ];

        return $behaviors;
    }

    public function get()
    {
        
    }
}
