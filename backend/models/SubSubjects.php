<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sub_subjects".
 *
 * @property string $id
 * @property string $description
 * @property string $goal
 * @property integer $days
 */
class SubSubjects extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sub_subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['description', 'goal','subject_id','days'], 'required'],
            [['description', 'goal'], 'string'],
            [['days', 'subject_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'goal' => 'Goal',
            'days' => 'Days',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject() {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }

}
