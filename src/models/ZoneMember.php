<?php

namespace codexten\yii\modules\geo\models;

use codexten\yii\modules\geo\models\query\ZoneMemberQuery;
use codexten\yii\db\ActiveRecord;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%zone_member}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property int $zone_id
 * @property string $code
 *
 * Defined properties:
 *
 * @property array $meta
 *
 * Defined relations:
 *
 * @property Zone $zone
 */
class ZoneMember extends ActiveRecord
{
    //const STATUS_ACTIVE = 1;
    //const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%zone_member}}';
    }

    /**
     * {@inheritdoc}
     * @return ZoneMemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ZoneMemberQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [
                ['zone_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Zone::class,
                'targetAttribute' => ['zone_id' => 'id'],
            ],
            [['code'], 'required'],
//            [['code', 'name'], 'unique', 'targetAttribute' => ['code', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('codexten:module:core', 'ID'),
            'zone_id' => Yii::t('codexten:module:core', 'Zone ID'),
            'code' => Yii::t('codexten:module:core', ''),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::class, ['id' => 'zone_id']);
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
    public function getMeta()
    {
        $meta = parent::getMeta();

        //if ($this->canView()) {
        //    $meta['viewUrl'] = Url::to(['@partner/view', 'id' => $this->id]);
        //}
        //if ($this->canUpdate()) {
        //    $meta['updateUrl'] = Url::to(['@partner/update', 'id' => $this->id]);
        //}

        return $meta;
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

    ///**
    //* statuses
    //* @return array
    //*/
    //public static function statuses()
    //{
    //    return [
    //        self::STATUS_ACTIVE => Yii::t('app', 'Active'),
    //        self::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    //    ];
    //}
}
