<?php

namespace codexten\yii\modules\geo\models;

use codexten\yii\db\ActiveRecord;
use codexten\yii\modules\geo\models\query\ZoneQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%zone}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $type
 *
 * Defined properties:
 *
 * @property array $meta
 *
 * Defined relations:
 *
 * @property ZoneMember[] $zoneMembers
 */
abstract class BaseZone extends ActiveRecord
{
    //const STATUS_ACTIVE = 1;
    //const STATUS_INACTIVE = 0;

    // types
    const TYPE_COUNTRY = 'country';
    const TYPE_PROVINCE = 'province';
    const TYPE_ZONE = 'zone';

    const TYPE = null;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->type = static::TYPE;
        parent::init();
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%zone}}';
    }

    /**
     * {@inheritdoc}
     * @return ZoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ZoneQuery(get_called_class(), ['type' => static::TYPE]);
    }

    public static function types()
    {
        return [
            self::TYPE_COUNTRY => Yii::t('codexten:module:core', 'Country'),
//            self::TYPE_PROVINCE => Yii::t('codexten:module:core', 'Province'),
            self::TYPE_ZONE => Yii::t('codexten:module:core', 'Zone'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'type'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
            [['code', 'name', 'type',], 'required'],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('codexten:module:core', 'ID'),
            'code' => Yii::t('codexten:module:core', 'Code'),
            'name' => Yii::t('codexten:module:core', 'Name'),
            'type' => Yii::t('codexten:module:core', 'Type'),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function beforeSave($insert)
    {
        $this->type = static::TYPE;

        return parent::beforeSave($insert);
    }

    /**
     * @return ActiveQuery
     */
    public function getZoneMembers()
    {
        return $this->hasMany(ZoneMember::class, ['zone_id' => 'id']);
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

}
