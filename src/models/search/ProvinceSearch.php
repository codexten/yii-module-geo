<?php

namespace codexten\yii\modules\geo\models\search;

use codexten\gnt\core\models\Member;
use codexten\yii\db\SearchModelInterface;
use codexten\yii\db\SearchModelTrait;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

class ProvinceSearch extends Model implements SearchModelInterface
{
    use SearchModelTrait;
    public $baseQuery;

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [

        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): DataProviderInterface
    {
        $query = $this->baseQuery ?: Member::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->sort,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
