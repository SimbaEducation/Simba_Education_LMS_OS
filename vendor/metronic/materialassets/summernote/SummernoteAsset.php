<?php

namespace metronic\materialassets\summernote;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap css files.
 *
 * Bootstrap Version <3.3.5>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class SummernoteAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/summernote/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/summernote.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/summernote.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
