<?php

namespace metronic\materialassets\googleFont;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic font files.
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class GoogleFontAsset extends AssetBundle
{
    public $baseUrl = 'http://fonts.googleapis.com';
    public $css = [
        'css?family=Open+Sans:400,300,600,700&subset=all'
    ];
    public $cssOptions = [
        'type' => 'text/css'
    ];
}
