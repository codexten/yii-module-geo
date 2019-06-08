<?php

namespace codexten\yii\modules\geo\models;

use codexten\yii\db\ActiveRecord;
use codexten\yii\modules\geo\models\query\ZoneQuery;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsTrait;
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
 * @property string $scope
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
    const TYPE_DISTRICT = 'district';

    // scopes
    const SCOPE_ALL = 'all';
    const SCOPE_SHIPPING = 'shipping';
    const SCOPE_TAX = 'tax';

    use SaveRelationsTrait;

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
        return new ZoneQuery(get_called_class());
    }

    public static function types()
    {
        return [
            self::TYPE_COUNTRY => Yii::t('codexten:module:core', 'Country'),
//            self::TYPE_PROVINCE => Yii::t('codexten:module:core', 'Province'),
            self::TYPE_ZONE => Yii::t('codexten:module:core', 'Zone'),
        ];
    }

    public static function scopes()
    {
        return [
            self::SCOPE_ALL => Yii::t('codexten:module:core', 'All'),
            self::SCOPE_SHIPPING => Yii::t('codexten:module:core', 'Shipping'),
            self::SCOPE_TAX => Yii::t('codexten:module:core', 'Tax'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['saveRelations'] = [
            'class' => SaveRelationsBehavior::class,
            'relations' => [
                'zoneMembers',
            ],
        ];

        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'type'], 'string', 'max' => 50],
            [['name', 'scope'], 'string', 'max' => 255],
            [['code', 'name', 'type', 'scope'], 'required'],
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
            'scope' => Yii::t('codexten:module:core', 'Scope'),
        ];
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
}
