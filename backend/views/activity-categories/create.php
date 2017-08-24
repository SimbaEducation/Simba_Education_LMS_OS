<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityCategories */

$this->title = 'Create Activity Categories';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Activity Categories', 'url' => ['preferences/index','check'=>0]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Create</span>
            <span class="caption-helper">a Activity Categories</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>