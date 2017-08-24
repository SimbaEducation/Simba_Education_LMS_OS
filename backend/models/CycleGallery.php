<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "cycle_gallery".
 *
 * @property string $id
 * @property string $cycle_id
 * @property string $picture
 *
 * @property Cycles $cycle
 */
class CycleGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cycle_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cycle_id'], 'integer'],
            [['picture'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cycle_id' => 'Cycle ID',
            'picture' => 'Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCycle()
    {
        return $this->hasOne(Cycles::className(), ['id' => 'cycle_id']);
    }
}
