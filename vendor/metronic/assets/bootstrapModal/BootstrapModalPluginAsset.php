<?php

namespace metronic\assets\bootstrapModal;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Modal js files.
 *
 * Boostrap Modal Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapModalPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapModal/dist';
    public $depends = [
        'metronic\assets\bootstrapModal\BootstrapModalAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles()
    {
		return [
			'js/bootstrap-modal.js',
            'js/bootstrap-modalmanager.js',
		];
    }

    public function init()
    {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }
}
