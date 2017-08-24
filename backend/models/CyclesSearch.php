<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cycles;

/**
 * CyclesSearch represents the model behind the search form about `backend\models\Cycles`.
 */
class CyclesSearch extends Cycles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age_start', 'age_end', 'segment_id', 'cycle_template_id', 'created_by'], 'integer'],
            [['name', 'short_description', 'long_description', 'thumbnail', 'creation_date', 'update_date', 'notes'], 'safe'],
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
        $query = Cycles::find();

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
            'segment_id' => $this->segment_id,
            'cycle_template_id' => $this->cycle_template_id,
            'created_by' => $this->created_by,
            'creation_date' => $this->creation_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'long_description', $this->long_description])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
