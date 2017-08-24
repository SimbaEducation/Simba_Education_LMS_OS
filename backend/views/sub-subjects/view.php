<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubSubjects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Learning Outcomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-book font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Learning Outcome</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['sub-subjects/update', 'id' => $model->id, 'check' => 3]) ?>" class="btn btn-default btn-circle">
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
                    'description:ntext',
                    'goal:ntext',
                    'days',
                    [
                        'label' => 'subject',
                        'value' => isset($model->subject->name) ? $model->subject->name : 'Null',
                    ],
                ],
            ])
            ?>

        </div>
