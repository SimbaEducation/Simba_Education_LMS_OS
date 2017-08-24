<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\School */

$this->title = 'Create School';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-graduation font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Create</span>
            <span class="caption-helper">a school</span>
        </div>
    </div>
    <div class="portlet-body form">
            <?=
            $this->render('_form', [
                'model' => $model,
                'user'=> $user,
            ])
            ?>
    </div>
</div>