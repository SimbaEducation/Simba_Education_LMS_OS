<?php

namespace common\components;

use yii\base\Component;
use yii;

class ImageComponent extends Component {

    const DEFAULT_IMAGES_PATH = '@images/default/';
    const NO_IMAGE = 'no_image.jpg';
    const SITE_LOGO = 'site_logo.png';

    public static function renderImageFromPath($filePath) {
        if (Yii::getAlias('@webroot').$filePath)
            return self::constructUrlFromPath($filePath);
        else
            return self::constructUrlFromPath(self::renderNoImage());
    }

    public static function constructUrlFromPath($fullPath) {
        
        // ALL POOR LOGIC //
        $occurance = strpos($fullPath, '/');
        $folder = substr($fullPath, 1, $occurance);

        if (YII_APP_END === 'front')
            return '@web/' . $folder . substr($fullPath, ++$occurance);
        else
            return '@web/../' . $folder . substr($fullPath, ++$occurance);
    }

    public static function constructPath($fileName) {
        return self::DEFAULT_IMAGES_PATH . $fileName;
    }

    public static function renderNoImage() {
        return self::constructPath(self::NO_IMAGE);
    }

    public static function getDefaultSiteLogo() {
        return self::constructPath(self::SITE_LOGO);
    }

}
