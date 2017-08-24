<?php

namespace metronic\themes\client\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class LoginAppAsset extends AssetBundle
{
    public $sourcePath = '@metronic/themes/client/resources/pages/login';
    public $css = [
    	'css/login.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
        'position' => View::POS_BEGIN
    ];
    public $js = [
    	'js/login.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript',
        'position' => View::POS_END
    ];
    public $depends = [
        'metronic\assets\bootstrap\BootstrapPluginAsset',
        'metronic\assets\jqueryValidate\JqueryValidateAsset'
    ];
}