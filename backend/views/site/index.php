<?php
/* @var $this yii\web\View */
/**
 * Summary Text
 */
use backend\models\User;
use backend\models\School;
use backend\models\Post;
use backend\models\Category;

//$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
//$this->params['breadcrumbs'][] = 'Dashboard';
?>
<div class="row">
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase rounded-3 margin-bottom-30">
            <h4 class="widget-thumb-heading">Users</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon widget-bg-color-purple icon-user"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Registered Users</span>
                    <span class="counter widget-thumb-body-stat"><?= Yii::$app->formatter->asInteger(User::getTotal()) ?></span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase rounded-3 margin-bottom-30">
            <h4 class="widget-thumb-heading">Schools</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon widget-bg-color-green icon-graduation"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Total Schools</span>
                    <span class="counter widget-thumb-body-stat"><?= Yii::$app->formatter->asInteger(school::getTotal()) ?></span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase rounded-3 margin-bottom-30">
            <h4 class="widget-thumb-heading">Post</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon widget-bg-color-red icon-support"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Total Post</span>
                    <span class="counter widget-thumb-body-stat"><?= Yii::$app->formatter->asInteger(post::getTotal()) ?></span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase rounded-3 margin-bottom-30">
            <h4 class="widget-thumb-heading">Categories</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon widget-bg-color-blue icon-bar-chart"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Total Category</span>
                    <span class="counter widget-thumb-body-stat"><?= Yii::$app->formatter->asInteger(Category::getTotal()) ?></span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-speech"></i>
                    <span class="caption-subject bold uppercase"> Portlet</span>
                    <span class="caption-helper">weekly stats...</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="javascript:;">
                        <i class="fa fa-pencil"></i> Edit </a>
                    <a class="btn btn-circle btn-default" href="javascript:;">
                        <i class="fa fa-plus"></i> Add </a>
                    <a class="btn btn-circle btn-default btn-icon-only fullscreen" href="javascript:;" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body" style="height: auto;">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div data-handle-color="#a1b2bd" data-rail-color="yellow" data-rail-visible="1" style="height: 200px; overflow: hidden; width: auto;" class="scroller" data-initialized="1">
                        <h4>Heading Text</h4>
                        <p>
                            Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                        </p>
                        <p>
                            nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                        </p>
                    </div><div class="slimScrollBar" style="background: rgb(161, 178, 189) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 22px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 152.091px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; background: yellow none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px; display: none;"></div></div>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>