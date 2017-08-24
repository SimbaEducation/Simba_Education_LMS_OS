<?php

namespace metronic\assets\bootstrapModal;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap modal css files.
 *
 * Bootstrap Modal Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapModalAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapModal/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
		return [
			'css/bootstrap-modal.css',
            'css/bootstrap-modal-bs3patch.css',
		];
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
