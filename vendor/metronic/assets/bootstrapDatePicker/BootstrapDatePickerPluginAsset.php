<?php

namespace metronic\assets\bootstrapDatePicker;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Date Picker js files.
 *
 * Boostrap Date Picker Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapDatePickerPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapDatePicker/dist';
    public $depends = [
        'metronic\assets\bootstrapDatePicker\BootstrapDatePickerAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/bootstrap-datepicker.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/bootstrap-datepicker.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
