<?php

namespace metronic\materialassets\select2;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select2 js files.
 *
 * Boostrap Select2 Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class Select2PluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/select2/dist';
    public $depends = [
        'metronic\assets\select2\Select2Asset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/select2.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/select2.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
