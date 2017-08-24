<?php

namespace metronic\themes\common\assets;

use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * @author Granjur
 * @since 1.0
 */
class MappAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl;
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $cssOptions = [
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        'metronic\materialassets\googleFont\GoogleFontAsset',
        'metronic\materialassets\fontAwesome\FontAwesomeAsset',
        'metronic\materialassets\simpleLineIcons\SimpleLineIconsAsset',
        'metronic\materialassets\uniform\UniformAsset',
//        'metronic\materialassets\jquery\JqueryAsset',
//        'metronic\materialassets\jquery\JqueryMigrateAsset',
        'metronic\materialassets\jquery\JqueryBlockUiAsset',
        'metronic\materialassets\uniform\UniformPluginAsset',
        'metronic\materialassets\jquery\JqueryCokieAsset',
    ];

    public function init() {
        parent::init();

        if (YII_APP_END === 'front')
            $this->baseUrl = '@web/assets';
        elseif (YII_APP_END === 'back')
            $this->baseUrl = '@web/assets_b';
        elseif (YII_APP_END === 'client')
            $this->baseUrl = '@web/assets_c';
        else
            throw new InvalidConfigException('Invalid end name configuration for the application.');
    }

}
