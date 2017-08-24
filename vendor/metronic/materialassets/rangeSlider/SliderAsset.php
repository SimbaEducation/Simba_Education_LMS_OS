<?php

namespace metronic\materialassets\rangeSlider;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter  select2 css files.
 *
 *  Select2 Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class SliderAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/rangeSlider/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles() {
        return [
            'css/ion.rangeSlider.css',
            'css/ion.rangeSlider.skinFlat.css',
        ];
    }

    public function init() {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }

}
