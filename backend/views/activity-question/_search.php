<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'lo_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'outcome_1') ?>

    <?php // echo $form->field($model, 'outcome_2') ?>

    <?php // echo $form->field($model, 'outcome_3') ?>

    <?php // echo $form->field($model, 'outcome_4') ?>

    <?php // echo $form->field($model, 'point_1') ?>

    <?php // echo $form->field($model, 'point_2') ?>

    <?php // echo $form->field($model, 'point_3') ?>

    <?php // echo $form->field($model, 'point_4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
