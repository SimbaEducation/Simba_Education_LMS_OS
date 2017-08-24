<?php

namespace metronic\materialassets\components;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Components css files.
 *
 * Components Version <N/A>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class ComponentsAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/components/dist';
    public $css = [
        'css/components-md.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
        'id' => 'style_components'
    ];
}