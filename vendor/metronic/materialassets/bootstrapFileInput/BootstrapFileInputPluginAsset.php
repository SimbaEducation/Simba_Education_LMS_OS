<?php

namespace metronic\materialassets\bootstrapFileInput;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select js files.
 *
 * Boostrap Select Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapFileInputPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/bootstrapFileInput/dist';
    public $depends = [
        'metronic\materialassets\bootstrapFileInput\BootstrapFileInputAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
		return [
			'js/bootstrap-fileinput.js',
		];
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
