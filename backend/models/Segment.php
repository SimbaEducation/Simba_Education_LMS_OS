<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "segment".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $color_code
 */
class segment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'segment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'color_code'], 'required'],
            [['description'], 'string'],
            [['name', 'color_code'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'status' => 'Status',
            'max_number_of_students' => 'Max Number Of Students',
            'max_number_of_teachers' => 'Max Number Of Teachers',
            'segment_id' => 'Segment ID',
        ];
    }
}
