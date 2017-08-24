<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "cycles".
 *
 * @property string $id
 * @property integer $age_start
 * @property integer $age_end
 * @property string $name
 * @property string $segment_id
 * @property string $cycle_template_id
 * @property string $short_description
 * @property string $long_description
 * @property string $thumbnail
 * @property integer $created_by
 * @property string $creation_date
 * @property string $update_date
 * @property string $notes
 *
 * @property CycleGallery[] $cycleGalleries
 * @property CycleTemplates $cycleTemplate
 * @property Segment $segment
 */
class Cycles extends \yii\db\ActiveRecord
{
    public $gallery;
    public $thumbnailupdate;
    public $cycle_template;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cycles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age_start', 'age_end', 'name', 'short_description', 'long_description', 'thumbnail', 'notes'], 'required'],
            [['age_start', 'age_end', 'segment_id', 'cycle_template_id', 'created_by'], 'integer'],
            [['short_description', 'long_description', 'notes'], 'string'],
            [['creation_date', 'update_date'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['thumbnail'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'age_start' => 'Age Start',
            'age_end' => 'Age End',
            'name' => 'Name',
            'segment_id' => 'Segment ID',
            'cycle_template_id' => 'Cycle Template',
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'thumbnail' => 'Thumbnail',
            'created_by' => 'Created By',
            'creation_date' => 'Creation Date',
            'update_date' => 'Update Date',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycleGalleries()
    {
        return $this->hasMany(CycleGallery::className(), ['cycle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycleTemplate()
    {
        return $this->hasOne(CycleTemplates::className(), ['id' => 'cycle_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegment()
    {
        return $this->hasOne(Segment::className(), ['id' => 'segment_id']);
    }
}
