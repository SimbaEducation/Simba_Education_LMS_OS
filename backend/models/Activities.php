<?php
/**
 * Activites
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property string $id
 * @property integer $age_start
 * @property integer $age_end
 * @property string $name
 * @property string $picture
 * @property string $description
 * @property string $category
 * @property integer $time_to_prepare
 * @property integer $duration
 * @property integer $created_by
 * @property string $creation_date
 * @property string $update_date
 * @property string $notes
 * @property string $hash
 *
 * @property ActivityCategories $category0
 * @property ActivityGallery[] $activityGalleries
 * @property ActivityQuestionList[] $activityQuestionLists
 */
class Activities extends \yii\db\ActiveRecord {

    public $question;
    public $gallery;
    public $gallery_id;
    public $galleryupdate;
    public $pictureupdate;
    public $avatar;
    public $add_your_files;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['filename','age_start', 'age_end', 'name', 'picture', 'description', 'time_to_prepare', 'duration', 'created_by', 'update_date', 'notes', 'hash'], 'required'],
            [['age_start', 'age_end', 'category', 'time_to_prepare', 'duration', 'created_by'], 'integer'],
            [['description', 'notes', 'hash'], 'string'],
            [['creation_date', 'update_date'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['galleryupdate', 'gallery'], 'file', 'extensions' => 'jpeg, jpg, png, gif', 'maxSize' => 20 * 1024 * 1024, 'maxFiles' => 1000],
            [['picture'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'age_start' => 'Age Start',
            'age_end' => 'Age End',
            'name' => 'Name',
            'picture' => 'Picture',
            'description' => 'Description',
            'category' => 'Category',
            'time_to_prepare' => 'Time To Prepare',
            'duration' => 'Duration',
            'created_by' => 'Created By',
            'creation_date' => 'Creation Date',
            'update_date' => 'Update Date',
            'notes' => 'Notes',
            'hash' => 'Hash',
            'filename' => 'Filename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorys() {
        return $this->hasOne(ActivityCategories::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityGalleries() {
        return $this->hasMany(ActivityGallery::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityInstructions() {
        return $this->hasMany(ActivityInstruction::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityQuestionLists() {
        return $this->hasMany(ActivityQuestionList::className(), ['activity_id' => 'id']);
    }

}
