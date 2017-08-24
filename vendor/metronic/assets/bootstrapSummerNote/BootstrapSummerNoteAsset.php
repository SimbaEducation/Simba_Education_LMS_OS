<?php

namespace metronic\assets\bootstrapSummerNote;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap SummerNote css files.
 *
 * Bootstrap SummerNote Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSummerNoteAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/bootstrapSummerNote/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
		return [
			'css/summernote.css',
		];
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
