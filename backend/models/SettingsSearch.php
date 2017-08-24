<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Settings;

/**
 * SettingsSearch represents the model behind the search form about `\backend\models\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['settingName', 'settingValue'], 'safe'],
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
        $query = Settings::find();

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
        ]);

        $query->andFilterWhere(['like', 'settingName', $this->settingName])
            ->andFilterWhere(['like', 'settingValue', $this->settingValue]);

        return $dataProvider;
    }
}
