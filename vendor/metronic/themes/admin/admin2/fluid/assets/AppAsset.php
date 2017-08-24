<?php

namespace metronic\themes\admin\admin2\fluid\assets;

use yii\web\AssetBundle;
use yii\web\View;

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
        'metronic\assets\bootstrapDatePicker\BootstrapDatePickerPluginAsset',
        'metronic\assets\bootstrapFileInput\BootstrapFileInputPluginAsset',
        'metronic\assets\bootstrapModal\BootstrapModalPluginAsset',
        'metronic\assets\bootstrapSummerNote\BootstrapSummerNotePluginAsset',
        'metronic\assets\select2\Select2PluginAsset',
        'metronic\assets\bootstrapSwitch\BootstrapSwitchPluginAsset',
        'metronic\assets\bootstrapHoverDropdown\BootstrapHoverDropdownAsset',
        'metronic\assets\jquerySlimscroll\JquerySlimscrollAsset',
        'metronic\assets\error\ErrorAsset',
        'metronic\assets\pjax\CustomPjaxAsset',
        'metronic\assets\jstree\JstreePluginAsset'
    ];
}