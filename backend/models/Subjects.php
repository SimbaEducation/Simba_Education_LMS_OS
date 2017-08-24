<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property string $id
 * @property string $name
 * @property integer $age_short
 * @property integer $age_end
 * @property string $standard
 * @property string $short_description
 * @property string $long_description
 * @property string $domain
 * @property string $notes
 *
 * @property Standards $standard0
 * @property DomainOfSubject $domain0
 */
class Subjects extends \yii\db\ActiveRecord {

    public $prerequisites;
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'domain', 'standard', 'age_short', 'age_end', 'short_description', 'long_description', 'notes'], 'required'],
            [['id', 'age_short', 'age_end', 'standard', 'domain'], 'integer'],
            [['long_description', 'notes'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['short_description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age_short' => 'Age Start - Age End ',
            'age_end' => 'Age End',
            'standard' => 'Standard',
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'domain' => 'Domain',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStandards() {
        return $this->hasOne(Standards::className(), ['id' => 'standard']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomains() {
        return $this->hasOne(DomainOfSubject::className(), ['id' => 'domain']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectRequisites() {
        return $this->hasMany(SubjectRequisites::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectRequisitesId() {
        return $this->hasMany(SubjectRequisites::className(), ['subject_prereq_id' => 'id']);
    }

}
