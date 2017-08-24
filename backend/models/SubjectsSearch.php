<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subjects;

/**
 * SubjectsSearch represents the model behind the search form about `backend\models\Subjects`.
 */
class SubjectsSearch extends Subjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age_short', 'age_end', 'standard', 'domain'], 'integer'],
            [['name', 'short_description', 'long_description', 'notes'], 'safe'],
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
        $query = Subjects::find();

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
            'age_short' => $this->age_short,
            'age_end' => $this->age_end,
            'standard' => $this->standard,
            'domain' => $this->domain,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'long_description', $this->long_description])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
