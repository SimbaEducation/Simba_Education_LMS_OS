<?php

namespace metronic\themes\common\assets;

use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/';
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $cssOptions = [
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        'metronic\assets\components\ComponentsAsset',
        'metronic\assets\plugins\PluginsAsset',
        'metronic\assets\metronic\MetronicAsset'
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