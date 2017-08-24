<?php

namespace metronic\materialassets\metronic;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Metronic files.
 *
 * Metronic Version <N/A>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class MetronicAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/metronic/dist';
    public $js = [
        'js/metronic.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];
}
