<?php

use codexten\yii\base\Module;
use codexten\yii\helpers\ArrayHelper;

return ArrayHelper::merge(
// $moduleGeo
    [
        'aliases' => [
            '@moduleGeo' => '@codexten/yii/modules/geo',
        ],
        'modules' => [
            'geo' => [
                'class' => Module::class,
                'controllerNamespace' => 'codexten\yii\modules\geo\controllers',
            ],
        ],
    ],

    // $moduleCountry
    [
        'components' => [
            'view' => [
                'theme' => [
                    'pathMap' => [
                        '@moduleCountry' => [
                            '@moduleGeo/modules/country/views',
                        ],
                    ],
                ],
            ],
        ],
    ]
);
