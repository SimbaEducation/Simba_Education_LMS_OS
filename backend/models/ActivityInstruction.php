<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "activity_instruction".
 *
 * @property string $id
 * @property string $filename
 * @property string $activity_id
 * @property string $link
 *
 * @property Activities $activity
 */
class ActivityInstruction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_instruction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'activity_id'], 'integer'],
            [['filename'], 'string', 'max' => 64],
            [['link'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'activity_id' => 'Activity ID',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['id' => 'activity_id']);
    }
}
