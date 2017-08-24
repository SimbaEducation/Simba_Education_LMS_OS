<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubSubjects;

/**
 * SubSubjectsSearch represents the model behind the search form about `backend\models\SubSubjects`.
 */
class SubSubjectsSearch extends SubSubjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'days'], 'integer'],
            [['description', 'goal'], 'safe'],
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
    public function search($params,$page)
    {
        $query = SubSubjects::find();

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
            'days' => $this->days,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'goal', $this->goal]);

        return $dataProvider;
    }
}
