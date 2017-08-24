<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityQuestion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Activity Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Activity Questions</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['activity-question/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
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
                    'question',
                    [
                        'label' => 'Learning Outcomes',
                        'value' => isset($model->lo->description) ? $model->lo->description : 'Null',
                    ],
                    [
                        'attribute' => 'outcome_1',
                        'format' => 'raw',
                        'value' =>
                        isset($model->type) && $model->type == 1 ? Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model->outcome_4, ['width' => '70px']) : '<span class="label label-sm label-primary" style="margin-right:5px;">' . $model->outcome_1 . '</span>' 
                    ],
                    'point_1',
                    [
                        'attribute' => 'outcome_2',
                        'format' => 'raw',
                        'value' =>
                        isset($model->type) && $model->type == 1 ? Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model->outcome_2, ['width' => '70px']) : '<span class="label label-sm label-primary" style="margin-right:5px;">' . $model->outcome_2 . '</span>' 
                    ],
                    'point_2',
                    [
                        'attribute' => 'outcome_3',
                        'format' => 'raw',
                        'value' =>
                        isset($model->type) && $model->type == 1 ? Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model->outcome_3, ['width' => '70px']) : '<span class="label label-sm label-primary" style="margin-right:5px;">' . $model->outcome_3 . '</span>' 
                    ],
                    'point_3',
                    [
                        'attribute' => 'outcome_4',
                        'format' => 'raw',
                        'value' =>
                        isset($model->type) && $model->type == 1 ? Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model->outcome_4, ['width' => '70px']) : '<span class="label label-sm label-primary" style="margin-right:5px;">' . $model->outcome_1 . '</span>' 
                    ],
                    'point_4',
                ],
            ])
            ?>
        </div>
    </div>
</div>
