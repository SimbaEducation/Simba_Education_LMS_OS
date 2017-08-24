<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\UserType;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$type = '';
if (isset($model->postTypes)) {
    foreach ($model->postTypes AS $val) {
        $userType = UserType::findOne($val->type_id);
        $type .= '<span class="label label-sm label-primary" style="margin-right:5px;">' . $userType->label . '</span>';
    }
}
$cat = '';
if (isset($model->category_id)) {
    $userType = Category::findOne($model->category_id);
    $cat .= '<span class="label label-sm label-primary" style="margin-right:5px;">' . $userType->name . '</span>';
}
?>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-green-sharp">
            <i class="icon-pencil font-green-sharp"></i>
            <span class="caption-subject bold uppercase">Post</span>
            <span class="caption-helper">View in your application</span>
        </div>
         <div class="actions">
            <a href="<?= Yii::$app->getUrlManager()->createUrl(['post/update', 'id' => $model->id]) ?>" class="btn btn-default btn-circle">
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
                    'description:ntext',
                    [
                        'attribute' => 'type',
                        'format' => 'raw',
                        'value' => $type,
                    ],
                    [
                        'attribute' => 'cat',
                        'format' => 'raw',
                        'value' => $cat,
                    ],
                    'created_at',
                ],
            ])
            ?>

        </div>
    </div>
</div>
