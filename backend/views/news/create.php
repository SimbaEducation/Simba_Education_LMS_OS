<?php
/**
 * Summary Text
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = 'Create News';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-paper-clip font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Create</span>
            <span class="caption-helper">a news</span>
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
