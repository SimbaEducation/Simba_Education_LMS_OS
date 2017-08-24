<?php

namespace metronic\themes\admin\admin4\fluid\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author GRANJUR
 * @since 1.0
 */
class MAppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $cssOptions = [
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        // css files
        'metronic\materialassets\googleFont\GoogleFontAsset',
        'metronic\materialassets\fontAwesome\FontAwesomeAsset',
        'metronic\materialassets\simpleLineIcons\SimpleLineIconsAsset',
        'metronic\materialassets\bootstrap\BootstrapAsset',
        'metronic\materialassets\uniform\UniformAsset',
        'metronic\materialassets\bootstrapSwitch\BootstrapSwitchAsset',
        'metronic\materialassets\bootstrapSelect\BootstrapSelectAsset',
        'metronic\materialassets\components\ComponentsAsset',
        'metronic\materialassets\plugins\PluginsAsset',
        'metronic\materialassets\summernote\SummernoteAsset',
        'metronic\materialassets\bootstrapFileInput\BootstrapFileInputAsset',
        // js files
        'metronic\materialassets\jquery\JqueryAsset',
        'metronic\materialassets\bootstrap\BootstrapPluginAsset',
        'metronic\materialassets\bootstrapHoverDropdown\BootstrapHoverDropdownAsset',
        'metronic\materialassets\jquerySlimscroll\JquerySlimscrollAsset',
        'metronic\materialassets\jquery\JqueryBlockUiAsset',
        'metronic\materialassets\uniform\UniformPluginAsset',
        'metronic\materialassets\bootstrapSwitch\BootstrapSwitchPluginAsset',
        'metronic\materialassets\jqueryValidate\JqueryValidateAsset',
        'metronic\materialassets\bootstrapSelect\BootstrapSelectPluginAsset',
        'metronic\materialassets\summernote\SummernotePluginAsset',
        'metronic\materialassets\rangeSlider\SliderPluginAsset',
        'metronic\materialassets\bootstrapWizard\BootstrapWizardPluginAsset',
//        'metronic\materialassets\jqueryMultiFilesUpload\JqueryMultiFilesUploadPluginAsset',
//        'metronic\materialassets\bootstrapFileInput\BootstrapFileInputPluginAsset',
//         'metronic\assets\customCss\CustomCssAsset',
    ];

}
