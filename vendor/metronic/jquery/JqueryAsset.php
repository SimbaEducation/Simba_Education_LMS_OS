<?php

namespace metronic\jquery;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jquery javascript library](http://jquery.com/)
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@metronic/jquery/dist';
    public $js = [
        'jquery.min.js',
    ];
}
