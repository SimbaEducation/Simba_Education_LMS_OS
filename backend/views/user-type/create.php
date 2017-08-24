<?php
/**
 * Summary Text
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserType */

$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'User Type', 'url' => ['/user-type/index']];
$this->params['breadcrumbs'][] = 'Create';
?>


<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-layers font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Create</span>
            <span class="caption-helper">create a user type</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>