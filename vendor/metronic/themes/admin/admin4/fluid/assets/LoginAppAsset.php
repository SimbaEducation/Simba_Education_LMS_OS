<?php

namespace metronic\themes\admin\admin4\fluid\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class LoginAppAsset extends AssetBundle {

    public $sourcePath = '@metronic/themes/admin/admin4/fluid/resources/pages/login';
    public $css = [
            //'css/login.css'
    ];
    public $cssOptions = [
        'type' => 'text/css',
        'position' => View::POS_BEGIN
    ];
    public $js = [
            //'js/login.js',
    ];
    public $jsOptions = [
        'type' => 'text/javascript',
        'position' => View::POS_END
    ];
    public $depends = [
        // css files
        'metronic\assets\googleFont\GoogleFontAsset',
        'metronic\assets\fontAwesome\FontAwesomeAsset',
        'metronic\assets\simpleLineIcons\SimpleLineIconsAsset',
        'metronic\assets\bootstrap\BootstrapAsset',
        'metronic\assets\uniform\UniformAsset',
        'metronic\assets\bootstrapSwitch\BootstrapSwitchAsset',
        'metronic\assets\select2\Select2Asset',
        'metronic\assets\select2\BootstrapSelect2Asset',
        'metronic\assets\components\ComponentsAsset',
        'metronic\assets\plugins\PluginsAsset',
        // js files
        'metronic\assets\jquery\JqueryAsset',
        'metronic\assets\bootstrap\BootstrapPluginAsset',
        'metronic\assets\bootstrapHoverDropdown\BootstrapHoverDropdownAsset',
        'metronic\assets\jquerySlimscroll\JquerySlimscrollAsset',
        'metronic\assets\jquery\JqueryBlockUiAsset',
        'metronic\assets\uniform\UniformPluginAsset',
        'metronic\assets\bootstrapSwitch\BootstrapSwitchPluginAsset',
        'metronic\assets\jqueryValidate\JqueryValidateAsset',
        'metronic\assets\select2\Select2PluginAsset',
//        'metronic\assets\app\AppPluginAsset',
    ];

}
