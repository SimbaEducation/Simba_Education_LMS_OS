<?php
/**
 * Summary Text
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_type".
 *
 * @property string $id
 * @property string $news_id
 * @property string $type_id
 *
 * @property News $news
 * @property UserType $type
 */
class NewsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'type_id'], 'required'],
            [['news_id', 'type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'type_id']);
    }
}
