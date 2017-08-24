<?php

namespace metronic\materialassets\bootstrapWizard;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select js files.
 *
 * Boostrap Select Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class BootstrapWizardPluginAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/bootstrapWizard/dist';
    public $depends = [
        'metronic\materialassets\bootstrapWizard\BootstrapWizardAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles() {
        if (YII_ENV_DEV) {
            return [
                'js/jquery.bootstrap.wizard.js',
                'js/form-wizard.js',
                'js/form-wizard-cycle.js',
            ];
        } else {
            return [
                'js/jquery.bootstrap.wizard.min.js',
                'js/form-wizard.js',
                'js/form-wizard-cycle.js',
            ];
        }
    }

    public function init() {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }

}
