<?php

namespace metronic\assets\jquery;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jquery javascript library] (http://jquery.com/)
 *
 * Jquery Version <1.11.2>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jquery/dist';
    public $js = [
        'js/jquery.min.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript',
    	'language' => 'javascript'
    ];
}
