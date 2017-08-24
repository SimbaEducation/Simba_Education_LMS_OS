<?php

namespace metronic\assets\jqueryUi;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic jquery-ui css files.
 *
 * Jquery Ui Version <1.11.2>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryUiAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jqueryUi/dist';
    public $css = [
    	'css/jquery-ui.min.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}
