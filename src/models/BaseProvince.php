<?php

namespace codexten\yii\modules\geo\models;

use codexten\yii\db\ActiveRecord;
use codexten\yii\modules\geo\models\query\ProvinceQuery;
use codexten\yii\modules\geo\modules\country\models\Country;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%province}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property int $country_id
 * @property string $type
 * @property string $code
 * @property string $name
 * @property string $abbreviation
 *
 * Defined properties:
 *
 * @property array $meta
 *
 * Defined relations:
 *
 * @property Country $country
 */
abstract class BaseProvince extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%province}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id','code','name'], 'required'],
            [['country_id'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [['name', 'abbreviation'], 'string', 'max' => 255],
            [
                ['country_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Country::class,
                'targetAttribute' => ['country_id' => 'id'],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'abbreviation' => Yii::t('app', 'Abbreviation'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }


    /**
     *{@inheritdoc}
     */
    public function canUpdate()
    {
        //if (!Yii::$app->user->can('partner.update')) {
        //    return false;
        //}

        return parent::canUpdate();
    }

    /**
     *{@inheritdoc}
     */
    public function canView()
    {
        //if (!Yii::$app->user->can('partner.view')) {
        //    return false;
        //}

        return parent::canView();
    }

    /**
     *{@inheritdoc}
     */
    public function canDelete()
    {
        //if (!Yii::$app->user->can('partner.delete')) {
        //    return false;
        //}

        return parent::canView();
    }


    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields = parent::fields();

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     * @return ProvinceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProvinceQuery(get_called_class());
    }
}
