<?php

namespace codexten\yii\modules\geo\models;

use codexten\yii\db\ActiveRecord;
use codexten\yii\modules\geo\models\query\ZoneGroupQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%zone_group}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property int $zone_id
 * @property string $type
 * @property string $group_code
 *
 * Defined properties:
 *
 * @property array $meta
 *
 * Defined relations:
 *
 * @property Zone $zone
 */
class ZoneGroup extends ActiveRecord
{
    const TYPE_STATE = 'state';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%zone_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id'], 'integer'],
            [['type', 'group_code'], 'string', 'max' => 50],
            [
                ['zone_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Zone::class,
                'targetAttribute' => ['zone_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'zone_id' => Yii::t('app', 'Zone ID'),
            'type' => Yii::t('app', 'Type'),
            'group_code' => Yii::t('app', 'Group Code'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
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

    /**
     * {@inheritdoc}
     * @return ZoneGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ZoneGroupQuery(get_called_class());
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
