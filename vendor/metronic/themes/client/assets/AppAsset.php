<?php

namespace metronic\themes\client\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_c';
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
        'metronic\assets\customCss\CustomCssAsset',
    ];
}