<?php

namespace metronic\materialassets\jqueryMultiFilesUpload;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Boostrap Select js files.
 *
 * Boostrap Select Version <N/A>
 * 
 * @author Saad Ali <saadali@granjur.net>
 * @since 1.0
 */
class JqueryMultiFilesUploadPluginAsset extends AssetBundle {

    public $sourcePath = '@metronic/materialassets/jqueryMultiFilesUpload/dist';
    public $depends = [
        'metronic\materialassets\jqueryMultiFilesUpload\JqueryMultiFilesUploadAsset'
    ];
    public $jsOptions = [
        'type' => 'text/javascript'
    ];

    private function getEnvironmentFiles() {
        return [
            'js/vendor/jquery.ui.widget.js',
            'js/vendor/tmpl.min.js',
            'js/vendor/load-image.min.js',
            'js/vendor/canvas-to-blob.min.js',
            'blueimp-gallery/jquery.blueimp-gallery.min.js',
            'js/jquery.iframe-transport.js',
            'js/jquery.fileupload.js',
            'js/jquery.fileupload-process.js',
            'js/jquery.fileupload-image.js',
//            'js/jquery.fileupload-audio.js',
//            'js/jquery.fileupload-video.js',
            'js/jquery.fileupload-validate.js',
            'js/jquery.fileupload-ui.js',
            'js/form-fileupload.js',
        ];
    }

    public function init() {
        parent::init();
        $this->js = $this->getEnvironmentFiles();
    }

}
