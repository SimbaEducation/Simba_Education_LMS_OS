<?php

namespace metronic\materialassets\jqueryValidate;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Jquery validate files
 *
 * Jquery Validate Version <1.14.0>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryValidateAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/jqueryValidate/dist';
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles() {
        if (YII_ENV_DEV) {
            return [
                'js/jquery.validate.js',
                'js/additional-methods.js',
            ];
        } else {
            return [
                'js/jquery.validate.min.js',
                'js/additional-methods.min.js',
            ];
        }
    }

    public function init() {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }

}
