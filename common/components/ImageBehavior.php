<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\web\UploadedFile;

class ImageBehavior extends Behavior
{
    public $attribute;
    
    public $path;
    
    public $saveAttribute;

    private $_file;
    
    
        /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->attribute === null) 
            throw new InvalidConfigException('The "attribute" property must be set.');
        if ($this->path === null) 
            throw new InvalidConfigException('The "path" property must be set.');
//        if ($this->url === null) 
//           throw new InvalidConfigException('The "url" property must be set.');
    }
    
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate'
        ];
    }
        
    /**
     * This method is invoked before deleting a record.
     */
     public function beforeDelete()
    {
        $this->deleteFile();
    }
    
    public function beforeUpdate()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        if ($model->getAttribute($this->saveAttribute) !== '') {
            $this->deleteFile();
        }
    }
    
    protected function deleteFile()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        if (!$oldFileName = $model->getOldAttribute($this->saveAttribute)) {
            return;
        }
        $filePath =  Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR . $this->path . DIRECTORY_SEPARATOR . $oldFileName;
        if (is_file($filePath)) {
            unlink($filePath);
        }
    }
    
}