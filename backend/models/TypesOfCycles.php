<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "types_of_cycles".
 *
 * @property string $id
 * @property string $name
 * @property integer $days
 */
class TypesOfCycles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'types_of_cycles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'days'], 'required'],
            [['days'], 'integer'],
            [['name'], 'string', 'max' => 64]
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
            'days' => 'Days',
        ];
    }
}
