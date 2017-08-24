<?php

namespace metronic\materialassets\angular;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic angular javascript files.
 *
 * AngularJs Version <1.3.10>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class AngularAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/angular/dist';
    public $js = [
        'js/angular.min.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];
}
