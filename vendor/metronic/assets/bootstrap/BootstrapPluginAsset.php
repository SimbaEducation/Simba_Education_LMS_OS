<?php

namespace metronic\assets\bootstrap;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * Bootstrap Version <3.3.5>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class BootstrapPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrap/dist';
    public $depends = [
        'metronic\assets\bootstrap\BootstrapAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/bootstrap.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/bootstrap.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
