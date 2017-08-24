<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserType;

/**
 * UserTypeSearch represents the model behind the search form about `common\models\UserType`.
 */
class UserTypeSearch extends UserType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'label'], 'safe'],
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
        $query = UserType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                'pagesize' => $page // in case you want a default pagesize
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
//            'active' => $this->active,
//            'added_at' => $this->added_at,
//            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
