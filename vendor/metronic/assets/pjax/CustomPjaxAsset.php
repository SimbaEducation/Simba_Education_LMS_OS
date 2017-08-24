<?php

namespace metronic\assets\pjax;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Custom pjax on grid asset files
 *
 * Version <1.0>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class CustomPjaxAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/pjax/dist';
    public $js = [
        'js/custom.pjax.js',
    ];
}
