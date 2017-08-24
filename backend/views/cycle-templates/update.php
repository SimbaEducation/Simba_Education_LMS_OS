<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CycleTemplates */

$this->title = 'Update Cycle Templates: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cycle Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Update</span>
            <span class="caption-helper">a Cycle Templates</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <?=
            $this->render('_updateform', [
                'model' => $model,
            ])
            ?>

        </div>
    </div>
</div>
