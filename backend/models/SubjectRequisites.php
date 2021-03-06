<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "subject_requisites".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property integer $subject_prereq_id
 */
class SubjectRequisites extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'subject_requisites';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'subject_id', 'subject_prereq_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'subject_prereq_id' => 'Subject Prereq ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject() {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectPrereq() {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_prereq_id']);
    }

}
