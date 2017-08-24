<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypesOfCycles */

$this->title = 'Create Types Of Cycles';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Types Of Cycles', 'url' => ['preferences/index', 'check' => 2]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Create</span>
            <span class="caption-helper">a Types of Cycles</span>
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