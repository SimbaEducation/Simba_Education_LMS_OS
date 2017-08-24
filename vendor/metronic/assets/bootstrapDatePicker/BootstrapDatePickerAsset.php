<?php

namespace metronic\assets\bootstrapDatePicker;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap date picker css files.
 *
 * Bootstrap Date Picker Version <3.3.2>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapDatePickerAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapDatePicker/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/bootstrap-datepicker.css',
                // 'css/bootstrap-datepicker3.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/bootstrap-datepicker.min.css',
                // 'css/bootstrap-datepicker3.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
