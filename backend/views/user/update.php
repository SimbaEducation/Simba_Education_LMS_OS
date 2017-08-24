<?php
/**
 * Summary Text
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/user/index']];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-users font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Update</span>
            <span class="caption-helper">a user</span>
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