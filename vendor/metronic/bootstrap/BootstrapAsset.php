<?php

namespace metronic\bootstrap;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap css files.
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@metronic/bootstrap/dist';
    public $css;

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/bootstrap.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/bootstrap.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
