<?php
/**
 * Activites Search
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Activities;

/**
 * ActivitiesSearch represents the model behind the search form about `backend\models\Activities`.
 */
class ActivitiesSearch extends Activities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age_start', 'age_end',  'category', 'time_to_prepare', 'duration', 'created_by'], 'integer'],
            [['name', 'picture', 'description', 'creation_date', 'update_date', 'notes', 'hash'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Activities::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'age_start' => $this->age_start,
            'age_end' => $this->age_end,
            'category' => $this->category,
            'time_to_prepare' => $this->time_to_prepare,
            'duration' => $this->duration,
            'created_by' => $this->created_by,
            'creation_date' => $this->creation_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'hash', $this->hash]);

        return $dataProvider;
    }
}
