<?php

namespace metronic\assets\select2;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter  select2 css files.
 *
 *  Select2 Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSelect2Asset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/select2/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
		return [
			'css/select2-bootstrap.min.css',
		];    	
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
