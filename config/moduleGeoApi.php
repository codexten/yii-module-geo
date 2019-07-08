<?php

use yii\rest\ActiveController;

return [
    'modules' => [
        'api' => [
            'modules' => [
                'geo' => [
                    'class' => \yii\base\Module::class,
                    'controllerMap' => [
                        'state' => [
                            'class' => ActiveController::class,
                            'modelClass' => \codexten\yii\modules\geo\models\State::class,
                        ],
                        'district' => [
                            'class' => ActiveController::class,
                            'modelClass' => \codexten\yii\modules\geo\models\District::class,
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
