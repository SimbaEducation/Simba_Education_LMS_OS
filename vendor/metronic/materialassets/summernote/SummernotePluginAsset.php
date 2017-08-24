<?php

namespace metronic\materialassets\summernote;

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
    public $sourcePath = '@metronic/materialassets/summernote/dist';
    public $depends = [
        'metronic\materialassets\summernote\SummernoteAsset'
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
