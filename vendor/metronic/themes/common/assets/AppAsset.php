<?php

namespace metronic\themes\common\assets;

use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl;
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $cssOptions = [
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        'metronic\assets\googleFont\GoogleFontAsset',
        'metronic\assets\fontAwesome\FontAwesomeAsset',
        'metronic\assets\simpleLineIcons\SimpleLineIconsAsset',
        'metronic\assets\uniform\UniformAsset',
        'metronic\assets\jquery\JqueryAsset',
        'metronic\assets\jquery\JqueryMigrateAsset',
        'metronic\assets\jquery\JqueryBlockUiAsset',
        'metronic\assets\uniform\UniformPluginAsset',
        'metronic\assets\jquery\JqueryCokieAsset',
    ];

    public function init()
    {
        parent::init();

        if(YII_APP_END === 'front')
            $this->baseUrl = '@web/assets';
        elseif(YII_APP_END === 'back')
            $this->baseUrl = '@web/assets_b';
		elseif(YII_APP_END === 'client')
            $this->baseUrl = '@web/assets_c';
        else
            throw new InvalidConfigException('Invalid end name configuration for the application.');
    }
}