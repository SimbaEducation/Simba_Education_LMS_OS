<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model backend\models\DomainOfSubject */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Domain Of Subjects', 'url' => ['index', 'check' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php

echo TabsX::widget([
    'items' => [
        [
            'label' => 'Activity Categories',
            'content' => $this->render('../activity-categories/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'active' => $check == 0 ? true : ''
        ],
        [
            'label' => 'Domain of Subject',
            'content' => $this->render('../domain-of-subject/update', [
                'model' => $model,
            ]),
            'options' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-class'],
            'active' => $check == 1 ? true : ''
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['class' => 'my-class'],
    'clientOptions' => ['collapsible' => false],
]);
?>
