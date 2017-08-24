<?php

namespace metronic\assets\summernote;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * Bootstrap Version <3.3.5>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class SummernotePluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/summernote/dist';
    public $depends = [
        'metronic\assets\summernote\SummernoteAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/summernote.min.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/summernote.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
