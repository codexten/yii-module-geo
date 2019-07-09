<?php

use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\search\DistrictSearch;
use codexten\yii\modules\geo\models\search\StateSearch;
use codexten\yii\modules\geo\models\State;
use codexten\yii\rest\ActiveController;
use yii\base\Module;

return [
    'modules' => [
        'api' => [
            'modules' => [
                'geo' => [
                    'class' => Module::class,
                    'controllerMap' => [
                        'state' => [
                            'class' => ActiveController::class,
                            'modelClass' => State::class,
                            'newSearchModel' => function () {
                                $className = 'codexten\yii\modules\geo\models\search\StateSearch';
                                $searchModel = new $className();

                                /* @var $searchModel StateSearch */

                                return $searchModel;
                            },
                        ],
                        'district' => [
                            'class' => ActiveController::class,
                            'modelClass' => District::class,
                            'newSearchModel' => function () {
                                $className = 'codexten\yii\modules\geo\models\search\DistrictSearch';
                                $searchModel = new $className();

                                /* @var $searchModel DistrictSearch */

                                return $searchModel;
                            },
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'urlManager' => [
            'rules' => [
                'api' => [
                    'controller' => [
                        'api/geo/state',
                        'api/geo/district',
                    ],
                ],
            ],
        ],
    ],
];
