<?php

namespace codexten\yii\modules\geo\models\search;

use codexten\yii\db\SearchModelInterface;
use codexten\yii\db\SearchModelTrait;
use codexten\yii\modules\geo\models\Province;
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
     * {@inheritDoc}
     */
    public function search(array $params): DataProviderInterface
    {
        $query = $this->baseQuery ?: Province::find();
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
