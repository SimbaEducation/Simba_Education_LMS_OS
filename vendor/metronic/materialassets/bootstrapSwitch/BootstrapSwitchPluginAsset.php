<?php

namespace metronic\materialassets\bootstrapSwitch;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap switch javascript files.
 *
 * Bootstrap Switch Version <3.3.2>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class BootstrapSwitchPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/bootstrapSwitch/dist';
    public $depends = [
        'metronic\materialassets\bootstrapSwitch\BootstrapSwitchAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/bootstrap-switch.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/bootstrap-switch.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
