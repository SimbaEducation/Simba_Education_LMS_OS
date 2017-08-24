<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "activity_question_list".
 *
 * @property string $id
 * @property string $activity_id
 * @property string $question_id
 *
 * @property Activities $activity
 * @property ActivityQuestion $question
 */
class ActivityQuestionList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_question_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'activity_id', 'question_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity ID',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['id' => 'activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(ActivityQuestion::className(), ['id' => 'question_id']);
    }
}
