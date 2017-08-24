<?php

namespace metronic\assets\bootstrapSelect;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select js files.
 *
 * Boostrap Select Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSelectPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapSelect/dist';
    public $depends = [
        'metronic\assets\bootstrapSelect\BootstrapSelectAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/bootstrap-select.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/bootstrap-select.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
