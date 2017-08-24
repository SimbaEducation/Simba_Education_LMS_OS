<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cycles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cycles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-tag font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Cycles</span>
            <span class="caption-helper">view in your application</span>
        </div>
        <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['cycles/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
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
                    [
                        'attribute' => 'thumbnail',
                        'label' => 'picture',
                        'format' => 'raw',
                        'value' =>
                        Html::img(Yii::getAlias('@web') . '/../uploads/cycles/' . $model->thumbnail, ['width' => '70px'])
                    ],
                    'name',
                    [
                        'label' => 'Segment',
                        'value' => isset($model->segment->name) ? $model->segment->name : 'Null',
                    ],
                    'short_description:ntext',
                    'long_description:ntext',
                    'creation_date',
                    'update_date',
                    'notes:ntext',
                ],
            ])
            ?>
        </div>
    </div>
</div>

