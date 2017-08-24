<?php

namespace metronic\assets\bootstrapSelect;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap select css files.
 *
 * Bootstrap Select Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSelectAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapSelect/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/bootstrap-select.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/bootstrap-select.min.css',
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
