<?php

namespace metronic\materialassets\jqueryMultiSelect;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * This asset bundle provides the Jquery Multi-Select js files.
 *
 * Jquery Multi-Select Version <0.9.11>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryMultiSelectPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jqueryMultiSelect/dist';
    public $js = [
        'js/jquery.multi-select.js'
    ];
    public $depends = [
        'metronic\assets\jqueryMultiSelect\JqueryMultiSelectAsset',
        'metronic\assets\jquery\JqueryAsset'
    ];
    public $jsOptions = [
    	'type' => 'text/javascript',
        'position' => View::POS_END
    ];
}
