<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */

$this->title = 'Create Settings';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase"><?= $this->title ?></span>
            <span class="caption-helper">Create setting in your application</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="settings-create">
            <?=
            $this->render('_form', [
                'model' => $model
            ])
            ?>

        </div>
    </div>
</div>
