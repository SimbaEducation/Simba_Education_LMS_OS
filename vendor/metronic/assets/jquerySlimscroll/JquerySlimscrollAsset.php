<?php

namespace metronic\assets\jquerySlimscroll;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Jquery Slimscroll js files.
 *
 * Jquery Slimscroll Version <1.3.2>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JquerySlimscrollAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jquerySlimscroll/dist';
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/jquery.slimscroll.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/jquery.slimscroll.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
