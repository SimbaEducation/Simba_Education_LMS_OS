<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "activity_question".
 *
 * @property string $id
 * @property string $question
 * @property string $lo_id
 * @property integer $type
 * @property string $outcome_1
 * @property string $outcome_2
 * @property string $outcome_3
 * @property string $outcome_4
 * @property integer $point_1
 * @property integer $point_2
 * @property integer $point_3
 * @property integer $point_4
 *
 * @property SubSubjects $lo
 */
class ActivityQuestion extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $image_1;
    public $image_2;
    public $image_3;
    public $image_4;
    
     public $outcome1;

    public static function tableName() {
        return 'activity_question';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
             [['question', 'lo_id', 'type', 'outcome_1', 'outcome_2', 'outcome_3', 'outcome_4', 'point_1', 'point_2', 'point_3', 'point_4'], 'required'],
//            [['image_1','image_2','image_3','image_4','outcome_1','outcome_2','outcome_3','outcome_4','lo_id','type','outcome_1','outcome_2','outcome_3','outcome_4','image_1','image_2','image_3','image_4','lo_id','point_1','point_2','point_3','point_4','question'], 'required'],
            [['lo_id', 'type', 'point_1', 'point_2', 'point_3', 'point_4'], 'integer'],
            [['question'], 'string', 'max' => 256],
//            [['outcome_1','outcome_2','outcome_3','outcome_4'], 'required', 'on' => 'text'],
//            [['image_1','image_2','image_3','image_4'], 'required', 'on' => 'image'],
            [['image_1','image_2','image_3','image_4'], 'safe'],
            [['image_1','image_2','image_3','image_4'], 'file', 'extensions' => 'jpg, png'],
            [['outcome_1', 'outcome_2', 'outcome_3', 'outcome_4'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'lo_id' => 'Learning Outcomes',
            'type' => 'Type',
            'outcome_1' => 'Outcome 1',
            'outcome_2' => 'Outcome 2',
            'outcome_3' => 'Outcome 3',
            'outcome_4' => 'Outcome 4',
            'point_1' => 'Point 1',
            'point_2' => 'Point 2',
            'point_3' => 'Point 3',
            'point_4' => 'Point 4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLo()
    {
        return $this->hasOne(SubSubjects::className(), ['id' => 'lo_id']);
    }

}
