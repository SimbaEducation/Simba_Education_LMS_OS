<?php

namespace metronic\materialassets\bootstrapSelect;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select js files.
 *
 * Boostrap Select Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapSelectPluginAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/bootstrapSelect/dist';
    public $depends = [
        'metronic\materialassets\bootstrapSelect\BootstrapSelectAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles() {
        if (YII_ENV_DEV) {
            return [
                'js/bootstrap-select.js',
                'js/app.min.js',
                'js/components-bootstrap-select.js',
                'js/jquery.multi-select.js',
                'js/select2.full.min.js',
                'js/components-multi-select.min.js',
            ];
        } else {
            return [
                'js/bootstrap-select.min.js',
                'js/app.min.js',
                'js/components-bootstrap-select.min.js',
                'js/jquery.multi-select.js',
                'js/select2.full.min.js',
                'js/components-multi-select.min.js',
            ];
        }
    }

    public function init() {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }

}
