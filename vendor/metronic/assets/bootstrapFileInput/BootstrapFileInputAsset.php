<?php

namespace metronic\assets\bootstrapFileInput;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap file input css files.
 *
 * Bootstrap File Input Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapFileInputAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapFileInput/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
		return [
			'css/bootstrap-fileinput.css',
		];
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
