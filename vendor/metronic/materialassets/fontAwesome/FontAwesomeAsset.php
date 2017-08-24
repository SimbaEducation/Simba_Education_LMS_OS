<?php

namespace metronic\materialassets\fontAwesome;

use yii\web\AssetBundle;

/**
 * This asset bundle provides Font Awesome files
 *
 * Font-Awesome Version <4.3.0>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/fontAwesome/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/font-awesome.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/font-awesome.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
