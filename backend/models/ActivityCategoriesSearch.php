<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ActivityCategories;

/**
 * ActivityCategoriesSearch represents the model behind the search form about `backend\models\ActivityCategories`.
 */
class ActivityCategoriesSearch extends ActivityCategories {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name', 'color_code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $page) {
        $query = ActivityCategories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => $page // in case you want a default pagesize
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'color_code', $this->color_code]);

        return $dataProvider;
    }

}
