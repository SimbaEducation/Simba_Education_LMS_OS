<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = 'Update News: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-paper-clip font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Update</span>
            <span class="caption-helper">Update a News</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <div class="row" style="padding:10px">
                <div class="col-lg-12">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
