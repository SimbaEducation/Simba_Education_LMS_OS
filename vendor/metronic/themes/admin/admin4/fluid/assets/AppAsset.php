<?php

namespace metronic\themes\admin\admin4\fluid\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author GRANJUR
 * @since 1.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $cssOptions = [
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        'metronic\assets\jqueryUi\JqueryUiPluginAsset',
        'metronic\assets\bootstrap\BootstrapPluginAsset',
        'metronic\assets\bootstrapSwitch\BootstrapSwitchPluginAsset',
        'metronic\assets\bootstrapHoverDropdown\BootstrapHoverDropdownAsset',
        'metronic\assets\jquerySlimscroll\JquerySlimscrollAsset',
        'metronic\assets\error\ErrorAsset',
        'metronic\assets\select2\BootstrapSelect2Asset',
        'metronic\assets\summernote\SummernotePluginAsset',
            // 'metronic\assets\customCss\CustomCssAsset',
    ];

}
