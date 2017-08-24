<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $phone
 *
 * @property UserSchool[] $userSchools
 */
class school extends \yii\db\ActiveRecord {

    public $school_manager;
    public $school_administrator;
    public $username;
    public $user_id;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'school_logo', 'school_manager', 'address', 'phone', 'status', 'max_number_of_students', 'max_number_of_teachers', 'segment_id'], 'required'],
            [['address'], 'string'],
//            [['school_logo'], 'required', 'on' => 'image'],
            [['school_logo'], 'safe'],
            [['school_logo'], 'file', 'extensions' => 'gif, jpg'],
            [['phone'], 'integer'],
            [['status', 'max_number_of_students', 'max_number_of_teachers', 'segment_id'], 'integer'],
            [['phone'], 'string', 'min' => 11],
            [['name'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'status' => 'Status',
            'school_logo' => 'School Logo',
            'max_number_of_students' => 'Max Number Of Students',
            'max_number_of_teachers' => 'Max Number Of Teachers',
            'segment_id' => 'Segment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffName() {
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSchools() {
        return $this->hasMany(UserSchool::className(), ['school_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getTotal() {
        return self::find()->count();
    }

}
