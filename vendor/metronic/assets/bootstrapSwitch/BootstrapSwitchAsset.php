<?php

namespace metronic\assets\bootstrapSwitch;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap swtich css files.
 *
 * Bootstrap Switch Version <3.3.2>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class BootstrapSwitchAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapSwitch/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/bootstrap-switch.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/bootstrap-switch.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
