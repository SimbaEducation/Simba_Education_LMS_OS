<?php

namespace metronic\materialassets\jqueryUi;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic jquery-ui js files.
 *
 * Jquery Ui Version <1.11.2>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryUiPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jqueryUi/dist';
    public $depends = [
        'metronic\materialassets\jqueryUi\JqueryUiAsset'
    ];
    public $js = [
        'js/jquery-ui.min.js'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];
}
