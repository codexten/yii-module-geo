<?php

namespace codexten\yii\modules\geo\models\search;

use codexten\yii\db\SearchModelInterface;
use codexten\yii\db\SearchModelTrait;
use codexten\yii\modules\geo\models\District;
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


    /**
     * {@inheritDoc}
     */
    public function search(array $params)
    {
        $query = $this->baseQuery ?: District::find();

        $q = \Yii::$app->request->get('q');
        if (!empty($q)) {
            $query->andWhere(['like', 'name', $q]);
        }

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
