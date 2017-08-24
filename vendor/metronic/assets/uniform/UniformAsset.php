<?php

namespace metronic\assets\uniform;

use yii\web\AssetBundle;

/**
 * Asset bundle for Uniform files.
 *
 * Uniform Version <1.8>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class UniformAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/uniform/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'css/uniform.default.css',
    		];
    	}
    	else
    	{
    		return [
    			'css/uniform.default.min.css'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
