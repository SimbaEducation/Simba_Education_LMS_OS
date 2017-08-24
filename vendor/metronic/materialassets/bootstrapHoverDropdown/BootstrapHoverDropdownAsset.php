<?php

namespace metronic\materialassets\bootstrapHoverDropdown;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Hover Dropdown js files.
 *
 * Boostrap Hover Dropdown Version <N/A>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class BootstrapHoverDropdownAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/bootstrapHoverDropdown/dist';
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
    	if(YII_ENV_DEV)
    	{
    		return [
    			'js/bootstrap-hover-dropdown.js',
    		];
    	}
    	else
    	{
    		return [
    			'js/bootstrap-hover-dropdown.min.js'
    		];
    	}
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
