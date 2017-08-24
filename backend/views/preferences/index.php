<?php
/**
 * Summary Text
 */
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\tabs\TabsX;

//use yii\jui\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivityCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Preferences'];
?>
<?php

echo TabsX::widget([
    'items' => [
        [
            'label' => 'Activity Categories',
            'content' => $this->render('../activity-categories/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'pageSize' => $pageSize,
            ]),
            'active' => $check == 0 ? true : ''
        ],
        [
            'label' => 'Domain of Subject',
            'content' => $this->render('../domain-of-subject/index', [
                'searchDomainOfSubject' => $searchDomainOfSubject,
                'dataProviderOfDomainOfSubject' => $dataProviderOfDomainOfSubject,
                'pageSize' => $pageSize,
            ]),
            'options' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-class'],
            'active' => $check == 1 ? true : ''
        ],
        [
            'label' => 'Types of Cycles',
            'content' => $this->render('../types-of-cycles/index', [
                'searchTypesOfCycles' => $searchTypesOfCycles,
                'dataProvidersearchTypesOfCycles' => $dataProvidersearchTypesOfCycles,
                'pageSize' => $pageSize,
            ]),
            'options' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-class'],
            'active' => $check == 2 ? true : ''
        ],
        [
            'label' => 'Standards',
            'content' => $this->render('../standards/index', [
                'searchStandards' => $searchStandards,
                'dataProvidersearchStandards' => $dataProvidersearchStandards,
                'pageSize' => $pageSize,
            ]),
            'options' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-class'],
            'active' => $check == 3 ? true : ''
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['class' => 'my-class'],
    'clientOptions' => ['collapsible' => false],
]);
?>