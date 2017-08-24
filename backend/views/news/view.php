<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\UserType;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$type = '';
if (isset($model->newsTypes)) {
    foreach ($model->newsTypes AS $val) {
        $userType = UserType::findOne($val->type_id);
         $type .= '<span class="label label-sm label-primary" style="margin-right:5px;">'.$userType->label.'</span>';
    }
}

?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-paper-clip font-green-sharp"></i>
            <span class="caption-subject bold uppercase">News</span>
            <span class="caption-helper"> view in your application</span>
        </div>
          <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['news/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
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
                    'title',
                    'description:ntext',
                    'status',
                    [   
                        'attribute' => 'type',
                              'format' => 'raw',
                        'value' => $type,
                            ],
                        ],
                    ])
                    ?>
        </div>
    </div>
</div>
