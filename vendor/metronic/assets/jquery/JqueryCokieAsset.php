<?php

namespace metronic\assets\jquery;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Jquery Cokie files
 *
 * Jquery Cokie Version <1.3.1>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryCokieAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jquery/dist';
    public $js = [
        'js/jquery.cokie.min.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];
}
