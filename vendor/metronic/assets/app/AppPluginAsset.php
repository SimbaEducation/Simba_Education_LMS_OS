<?php

namespace metronic\assets\app;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * Bootstrap Version <3.3.5>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class AppPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/app/dist';
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(!YII_ENV_DEV)
    	{
    		return [
                'js/bootstrap.js',
    		];
    	}
    	else
    	{
    		return [
                'js/app.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
