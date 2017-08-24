<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityCategories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Activity Categories', 'url' => ['preferences/index','check'=>0]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Activity Category</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['activity-categories/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
                <i class="fa fa-plus"></i>
                <span class="hidden-480">
                    Update </span>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'color_code',
                ],
            ])
            ?>
        </div>
    </div>
</div>
