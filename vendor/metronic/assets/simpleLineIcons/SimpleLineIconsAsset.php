<?php

namespace metronic\assets\simpleLineIcons;

use yii\web\AssetBundle;

/**
 * Asset bundle for Simpe Line Icons files.
 *
 * Simple Line Icons Version <N/A>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class SimpleLineIconsAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/simpleLineIcons/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/simple-line-icons.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/simple-line-icons.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
