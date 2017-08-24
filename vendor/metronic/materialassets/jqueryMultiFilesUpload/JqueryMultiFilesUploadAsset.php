<?php

namespace metronic\materialassets\jqueryMultiFilesUpload;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Metronic Twitter bootstrap file input css files.
 *
 * Bootstrap File Input Version <unknown>
 *
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class JqueryMultiFilesUploadAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/jqueryMultiFilesUpload/dist';
    public $css;
    public $cssOptions = [
        'type' => 'text/css',
    ];

    private function getEnvironmentFiles() {
        return [
            'blueimp-gallery/blueimp-gallery.min.css',
            'css/jquery.fileupload.css',
            'css/jquery.fileupload-ui.css',
        ];
    }

    public function init() {
        parent::init();
        $this->css = $this->getEnvironmentFiles();
    }

}
