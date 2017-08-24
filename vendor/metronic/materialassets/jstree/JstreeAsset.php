<?php

namespace metronic\materialassets\jstree;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Jquery Js Tree css files.
 *
 * Js Tree Version <3.0.4>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JstreeAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jstree/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/style.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/style.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
