<?php

use codexten\yii\base\Module;
use codexten\yii\helpers\ArrayHelper;
use codexten\yii\modules\geo\controllers\DistrictController;
use codexten\yii\modules\geo\controllers\StateController;
use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\search\DistrictSearch;
use codexten\yii\modules\geo\models\search\StateSearch;
use codexten\yii\modules\geo\models\State;

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
                'controllerMap' => [
                    'district' => [
                        'class' => DistrictController::class,
                        'modelClass' => District::class,
                        'newSearchModel' => function () {
                            $className = 'codexten\yii\modules\geo\models\search\DistrictSearch';
                            $searchModel = new $className();

                            /* @var $searchModel DistrictSearch */

                            return $searchModel;
                        },
                    ],
                    'state' => [
                        'class' => StateController::class,
                        'modelClass' => State::class,
                        'newSearchModel' => function () {
                            $className = 'codexten\yii\modules\geo\models\search\StateSearch';
                            $searchModel = new $className();

                            /* @var $searchModel StateSearch */

                            return $searchModel;
                        },
                    ],
                ],
            ],
        ],
    ],

    // $moduleCountry
    [
        'components' => [
            'view' => [
                'theme' => [
                    'pathMap' => [
                        '@moduleCountry/views' => [
                            '@moduleGeo/modules/country/views',
                        ],
                    ],
                ],
            ],
        ],
    ]
);
