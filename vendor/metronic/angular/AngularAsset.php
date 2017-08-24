<?php

namespace metronic\angular;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic angular javascript files.
 *
 * @author Muhammad Hassan Jamil <hassan@granjur.com>
 * @since 1.0
 */
class AngularAsset extends AssetBundle
{
    public $sourcePath = '@metronic/angular/dist';
    public $js = [
        'angular.min.js',
    ];
}
