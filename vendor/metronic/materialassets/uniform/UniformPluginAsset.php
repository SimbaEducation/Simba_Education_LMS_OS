<?php

namespace metronic\materialassets\uniform;

use yii\web\AssetBundle;

/**
 * Asset bundle for Uniform files.
 *
 * Uniform Version <2.1.0>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class UniformPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/uniform/dist';
    public $js;
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/jquery.uniform.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/jquery.uniform.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
