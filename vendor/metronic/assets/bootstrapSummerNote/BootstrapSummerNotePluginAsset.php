<?php

namespace metronic\assets\bootstrapSummerNote;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the bootstrap SummerNote js files.
 *
 * bootstrap SummerNote Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSummerNotePluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapSummerNote/dist';
    public $depends = [
        'metronic\assets\bootstrapSummerNote\BootstrapSummerNoteAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/summernote.js',
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
