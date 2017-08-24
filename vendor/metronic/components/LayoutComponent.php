<?php

namespace metronic\components;

use yii\base\Component;

/**
 * Helper class to configure following items for all the ends of application
 * -> page title
 * -> page description
 * -> page breadcrumbs
 */
class LayoutComponent extends Component
{
    public static function buildTitle($appName, $actionName, $separator = ' | ')
    {
        return $appName . $separator . self::buildActionName($actionName);
    }

    public static function buildActionName($actionName)
    {
    	return ucfirst(strtolower($actionName));
    }

    public static function getFromTemplate()
    {
    	return '{label} <div class="col-md-6">{input}{error}{hint}</div>';
    }

    public static function getFromTemplateWithIcon($iconClass = '')
    {
        return '{label} <div class="col-md-6"><div class="input-group"><span class="input-group-addon" style="background-color: #e5e5e5;"><i class="'.$iconClass.'"></i></span>{input}</div>{error}{hint}</div>';
    }

    public static function getAjaxFromTemplateWithIcon($iconClass = '')
    {
        return '{label} <div class="col-md-12"><div class="input-group"><span class="input-group-addon" style="background-color: #e5e5e5;"><i class="'.$iconClass.'"></i></span>{input}</div>{error}{hint}</div>';
    }

    public static function getFormLabelCssClass()
    {
    	return 'control-label col-md-3';
    }

    public static function getAjaxFromTemplate()
    {
        return '{label} <div class="col-md-12">{input}{error}{hint}</div>';
    }
}