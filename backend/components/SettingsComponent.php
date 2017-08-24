<?php
namespace backend\components;

use yii\base\Component;
use backend\models\Settings;
use yii\helpers\Html;
class SettingsComponent extends Component{
	
    public function init(){
            parent::init();
    }

    public function getValue($module, $settingName){
        $model = Settings::find()
        ->where(['settingName' => $settingName])
        ->one(); 
        if(isset($model))
            return $model->settingValue;
        else
            return '';
    }
    
    public function replaceEmailText($type, $documentPatterns){
        $str = $this->getValue('emailTemplate', $type);
        if($str){
           foreach ($documentPatterns as $pattern => $valueData)
            {
               $pattern = '/'.$pattern.'/';
                if(preg_match_all($pattern, $str, $matches))
                {
                    $str = preg_replace($pattern, Html::encode($valueData), $str);
                }
            }
            return array('status' => true, 'str' => $str); 
        }
        else{
            return array('status' => false, 'str' => $str); 
        }
        
    }
    
    public function getPatternArr($model){
        $data = [
            '{username}' => $model->username,
            '{email}' => $model->email,
            '{first_name}' => $model->first_name,
            '{last_name}' => $model->last_name,
        ];
        return $data;
    }
	
}
?>