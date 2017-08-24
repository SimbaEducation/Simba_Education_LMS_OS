<?php

namespace metronic\assets\plugins;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Plugins css files.
 *
 * Plugins Version <N/A>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class PluginsAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/plugins/dist';
    public $css = [
        'css/plugins-md.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}