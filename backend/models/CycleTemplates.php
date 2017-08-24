<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "cycle_templates".
 *
 * @property string $id
 * @property string $name
 * @property string $type_of_cycle_id
 *
 * @property CycleTemplateDays[] $cycleTemplateDays
 * @property TypesOfCycles $typeOfCycle
 */
class CycleTemplates extends \yii\db\ActiveRecord {

    public $for_day;
    public $emphasis;
    public $duration;
    public $activity_category;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cycle_templates';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'type_of_cycle_id'], 'required'],
            [['type_of_cycle_id'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_of_cycle_id' => 'Type Of Cycle ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycleTemplateDays() {
        return $this->hasMany(CycleTemplateDays::className(), ['cycle_template_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeOfCycle() {
        return $this->hasOne(TypesOfCycles::className(), ['id' => 'type_of_cycle_id']);
    }
    
      /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycleSelectedActivities($id = null) {
        if($id != null)
        {
            return $this->hasMany(CycleSelectedActivity::className(), ['cycle_template_day_id' => 'id' , 'cycle_id' => $id]);
        }
        else {
            return $this->hasMany(CycleSelectedActivity::className(), ['cycle_template_day_id' => 'id']);
        }
    }

}
