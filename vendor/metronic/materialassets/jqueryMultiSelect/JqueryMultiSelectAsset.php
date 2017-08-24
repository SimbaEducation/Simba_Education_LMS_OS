<?php

namespace metronic\materialassets\jqueryMultiSelect;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Jquery Multi-Select css files.
 *
 * Jquery Multi-Select Version <N/A>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryMultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jqueryMultiSelect/dist';
    public $css = [
        'css/multi-select.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}
