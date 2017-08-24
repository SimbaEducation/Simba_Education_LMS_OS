<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $type
 */
class News extends \yii\db\ActiveRecord {

    public $type;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'type', 'description', 'status', 'segment_id'], 'required'],
            [['description'], 'string'],
            [['status', 'segment_id'], 'integer'],
            [['title'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'segment_id' => 'Segment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegment() {
        return $this->hasOne(Segment::className(), ['id' => 'segment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTypes() {
        return $this->hasMany(NewsType::className(), ['news_id' => 'id']);
    }

}
