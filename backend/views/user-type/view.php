<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserType */

$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'User Types', 'url' => ['/user-type/index']];
$this->params['breadcrumbs'][] = 'View';
?>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-layers font-blue"></i>
            <span class="caption-subject font-blue bold uppercase">View</span>
            <span class="caption-helper">view a user type</span>
        </div>
    </div>
    <div class="portlet-body">
         <div class="user-type-view">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'type',
                        'label',
                        [
                            'label'=>'Status',
                            'format'=>'raw',
                            'value'=>$model->getUserTypeStatusHtml()
                        ],
                        'added_at:date',
                      
                    ],
                ]) ?>

            </div>
    </div>
</div>

            
           
