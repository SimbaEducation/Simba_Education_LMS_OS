<?php

namespace backend\assets_b;

use yii\web\AssetBundle;

/**
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class GAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $cs = [];
    public $js = [];
    public $depends = [
        'metronic\font\FontAsset',
        'metronic\bootstrap\BootstrapAsset',
        'metronic\jquery\JqueryAsset',
        'metronic\bootstrap\BootstrapPluginAsset',
        'metronic\angular\AngularAsset',
    ];
}
