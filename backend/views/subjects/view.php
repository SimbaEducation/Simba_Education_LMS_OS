<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Subjects</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['subjects/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
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
                    'name',
                    [
                        'label' => 'domain',
                        'value' => isset($model->domains->name)?$model->domains->name:'Null',
                    ],
                    [
                        'label' => 'standard',
                        'value' => isset($model->standards->name)?$model->standards->name:'Null',
                    ],
                    [ 'label' => 'Age Start/Age End',
                        'value' => $model->age_short . "/" . $model->age_end,
                    ],
                    'short_description',
                    'long_description:ntext',
                    'notes:ntext',
                ],
            ])
            ?>

        </div>
