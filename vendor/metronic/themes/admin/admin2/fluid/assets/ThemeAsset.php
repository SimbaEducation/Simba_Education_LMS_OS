<?php

namespace metronic\themes\admin\admin2\fluid\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@metronic/themes/admin/admin2/fluid/resources/layouts/site';
    public $css = [ 
        'css/layout.css',
        'css/grey.css',
        'css/custom.css',
        'css/tasks.css',
        'css/todo.css',

    ];
    public $cssOptions = [
        'type' => 'text/css',
        'position' => View::POS_BEGIN
    ];
    public $js = [
        'js/layout.js',
        'js/demo.js',
		'js/quick-sidebar.js',
		'js/index.js',
		'js/tasks.js',
        'js/todo.js',
    ];
    public $jsOptions = [
        'type' => 'text/javascript',
        'position' => View::POS_END
    ];
}