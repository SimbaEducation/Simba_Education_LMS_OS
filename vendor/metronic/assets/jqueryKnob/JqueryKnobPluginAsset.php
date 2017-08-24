<?php

namespace metronic\assets\jqueryKnob;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Jquery Knob javascript files..
 *
 * Bootstrap Switch Version <1.2.8>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryKnobPluginAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/jqueryKnob/dist';
    public $depends = [
        'metronic\assets\jquery\JqueryAsset',
    ];
    public $js = [
        'js/jquery.knob.js'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];
}
