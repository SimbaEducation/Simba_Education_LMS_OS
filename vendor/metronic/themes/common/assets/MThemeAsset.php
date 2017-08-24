<?php

namespace metronic\themes\common\assets;

use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * @author Granjur
 * @since 1.0
 */
class MThemeAsset extends AssetBundle
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
        'metronic\materialassets\components\ComponentsAsset',
        'metronic\materialassets\plugins\PluginsAsset',
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