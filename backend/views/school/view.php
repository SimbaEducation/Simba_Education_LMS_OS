<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\School */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-graduation font-green-sharp"></i>
            <span class="caption-subject bold uppercase">School</span>
            <span class="caption-helper">View in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['school/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
                <i class="fa fa-plus"></i>
                <span class="hidden-480">
                    Update </span>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'address:ntext',
                'phone',
            ],
        ])
        ?>

    </div>
</div>
</div>
