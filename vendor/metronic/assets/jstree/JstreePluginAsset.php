<?php

namespace metronic\assets\jstree;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Jquery Js Tree javascript files.
 *
 * Js Tree Version <3.0.4>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JstreePluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jstree/dist';
    public $depends = [
        'metronic\assets\jstree\JstreeAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/jstree.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/jstree.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
