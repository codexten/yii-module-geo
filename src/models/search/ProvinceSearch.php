<?php

namespace codexten\yii\modules\geo\models\search;

use codexten\yii\db\SearchModelInterface;
use codexten\yii\db\SearchModelTrait;
use codexten\yii\modules\geo\models\Province;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProvinceSearch extends Model implements SearchModelInterface
{
    use SearchModelTrait;

    public $baseQuery;
    public $country;
    public $code;
    public $name;
    public $abbreviation;

    public function rules()
    {
        return [
            [
                [
                    'country',
                    'code',
                    'name',
                    'abbreviation',
                ],
                'safe',
            ],
        ];
    }

    /**
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params)
    {
        $query = $this->baseQuery ?: Province::find();

 /*       $q = \Yii::$app->request->get('q');
        if (!empty($q)) {
            $query->andWhere(['like', 'name', $q]);
        }*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->sort,
        ]);
        $query->joinWith([
            'country as country',
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', Province::tableName().'.code', $this->code]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'abbreviation', $this->abbreviation]);
        //$query->andFilterWhere(['like', 'country.name', $this->country]);

        return $dataProvider;
    }
}
