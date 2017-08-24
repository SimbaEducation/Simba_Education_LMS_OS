<?php

namespace metronic\materialassets\jquery;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the Jquery Migrate Files
 *
 * Jquery Migrate Version <1.2.1>
 * 
 * @author Muhammad Hassan Jamil <hassan.jamil@granjur.net>
 * @since 1.0
 */
class JqueryMigrateAsset extends AssetBundle
{
    public $sourcePath = '@metronic/materialassets/jquery/dist';
    public $js = [
        'js/jquery-migrate.min.js',
    ];
    public $jsOptions = [
    	'type' => 'text/javascript'
    ];
}
