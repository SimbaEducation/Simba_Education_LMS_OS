<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Activities */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Activities</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['activities/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
                <i class="fa fa-plus"></i>
                <span class="hidden-480">
                    Update </span>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="user-create">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [ 'label' => 'Age Start - Age End',
                        'value' => $model->age_start . "/" . $model->age_end,
                    ],
                    'name',
                    [
                        'attribute' => 'picture',
                        'label' => 'picture',
                        'format' => 'raw',
                        'value' =>
                        Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model->picture, ['width' => '70px'])
                    ],
                    [
                        'label' => 'category',
                        'value' => isset($model->categorys->name) ? $model->categorys->name : 'Null',
                    ],
                    'description:ntext',
                    'time_to_prepare',
                    'duration',
                    'notes:ntext',
                    'hash:ntext',
                ],
            ])
            ?>

        </div>
    </div>
</div>
