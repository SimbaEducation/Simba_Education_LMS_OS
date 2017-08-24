<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "cycle_selected_activity".
 *
 * @property string $id
 * @property string $activity_id
 * @property string $category_id
 * @property string $cycle_template_day_id
 * @property string $cycle_id
 *
 * @property Cycles $cycle
 * @property Activities $activity
 * @property ActivityCategories $category
 * @property CycleTemplateDays $cycleTemplateDay
 */
class CycleSelectedActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cycle_selected_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'category_id', 'cycle_template_day_id', 'cycle_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity ID',
            'category_id' => 'Category ID',
            'cycle_template_day_id' => 'Cycle Template Day ID',
            'cycle_id' => 'Cycle ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycle()
    {
        return $this->hasOne(Cycles::className(), ['id' => 'cycle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['id' => 'activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ActivityCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycleTemplateDay()
    {
        return $this->hasOne(CycleTemplateDays::className(), ['id' => 'cycle_template_day_id']);
    }
}
