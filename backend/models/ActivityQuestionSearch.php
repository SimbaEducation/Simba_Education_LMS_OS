<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ActivityQuestion;

/**
 * ActivityQuestionSearch represents the model behind the search form about `backend\models\ActivityQuestion`.
 */
class ActivityQuestionSearch extends ActivityQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lo_id', 'type', 'point_1', 'point_2', 'point_3', 'point_4'], 'integer'],
            [['question', 'outcome_1', 'outcome_2', 'outcome_3', 'outcome_4'], 'safe'],
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
        $query = ActivityQuestion::find();

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
            'lo_id' => $this->lo_id,
            'type' => $this->type,
            'point_1' => $this->point_1,
            'point_2' => $this->point_2,
            'point_3' => $this->point_3,
            'point_4' => $this->point_4,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'outcome_1', $this->outcome_1])
            ->andFilterWhere(['like', 'outcome_2', $this->outcome_2])
            ->andFilterWhere(['like', 'outcome_3', $this->outcome_3])
            ->andFilterWhere(['like', 'outcome_4', $this->outcome_4]);

        return $dataProvider;
    }
}
