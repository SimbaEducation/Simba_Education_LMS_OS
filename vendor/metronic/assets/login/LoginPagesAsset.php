<?php

namespace metronic\assets\login;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap javascript files.
 *
 * Bootstrap Version <3.3.5>
 *
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class LoginPagesAsset extends AssetBundle
{
    public $sourcePath = '@metronic/assets/login/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles()
    {
        if(!YII_ENV_DEV)
        {
            return [
                'css/bootstrap.css'
            ];
        }
        else
        {
            return [
                'css/login.min.css',
            ];
        }
    }

    public function init()
    {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }
}
