<?php

namespace metronic\materialassets\jquery;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Jquery BlockUi files.
 *
 * Jquery BlockUi Version <1.7>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryBlockUiAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jquery/dist';
    public $js = [
        'js/jquery.blockui.min.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];
}
