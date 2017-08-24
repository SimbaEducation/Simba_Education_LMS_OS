<?php

namespace metronic\assets\error;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic jquery-ui css files.
 *
 * Jquery Ui Version <1.11.2>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class ErrorAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/error/dist';
    public $css = [
    	'css/error.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}
