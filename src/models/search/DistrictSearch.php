<?php

namespace codexten\yii\modules\geo\models\search;

use codexten\yii\db\SearchModelInterface;
use codexten\yii\db\SearchModelTrait;
use codexten\yii\modules\geo\models\District;
use codexten\yii\modules\geo\models\Zone;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class Province
 *
 * @package codexten\yii\modules\geo\models\search
 */
class DistrictSearch extends Model implements SearchModelInterface
{
    use SearchModelTrait;

    public $baseQuery;
    public $code;
    public $name;
    public $state_name;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                [
                    'code',
                    'name',
                    'state_name',
                ],
                'safe',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function search(array $params)
    {
        $query = $this->baseQuery ?: District::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->sort,
        ]);

        $q = \Yii::$app->request->get('q');
        if (!empty($q)) {
            $query->andWhere(['like', 'name', $q]);
        }

        $query->joinWith([
            'state as state',
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', Zone::tableName() . '.code', $this->code]);
        $query->andFilterWhere(['like', Zone::tableName() . '.name', $this->name]);
        $query->andFilterWhere(['like', 'state.name', $this->state_name]);

        return $dataProvider;
    }
}
