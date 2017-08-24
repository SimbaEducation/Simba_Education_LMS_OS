<?php

namespace metronic\bootstrap;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class BootstrapPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/bootstrap/dist';
    public $js;
    public $depends = [
        'metronic\jquery\JqueryAsset',
        'metronic\bootstrap\BootstrapAsset',
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
