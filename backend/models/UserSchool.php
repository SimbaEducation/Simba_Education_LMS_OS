<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_school".
 *
 * @property string $id
 * @property integer $school_id
 * @property string $user_id
 * @property string $created_at
 *
 * @property School $school
 * @property User $user
 */
class UserSchool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'user_id', 'created_at'], 'required'],
            [['school_id', 'user_id'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
