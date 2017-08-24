<?php

namespace metronic\themes\admin\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@metronic/themes/admin/resources/layouts/site';
    public $css = [ 
        'css/layout.css',
        'css/light.css',  // missing in html - id="style_color"
        'css/custom.css'   
    ];
    public $cssOptions = [
        'type' => 'text/css',
        'position' => View::POS_BEGIN
    ];
    public $js = [
        'js/layout.js',
        'js/demo.js'
    ];
    public $jsOptions = [
        'type' => 'text/javascript',
        'position' => View::POS_END
    ];
}