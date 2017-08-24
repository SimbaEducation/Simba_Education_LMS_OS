<?php

namespace metronic\materialassets\rangeSlider;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select2 js files.
 *
 * Boostrap Select2 Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class SliderPluginAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/rangeSlider/dist';
    public $depends = [
        'metronic\materialassets\rangeSlider\SliderAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles() {
        if (YII_ENV_DEV) {
            return [
                'js/ion.rangeSlider.js',
                'js/components-ion-sliders.js',
            ];
        } else {
            return [
                'js/ion.rangeSlider.min.js',
                'js/components-ion-sliders.js',
            ];
        }
    }

    public function init() {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }

}
