<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivitiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'age_start') ?>

    <?= $form->field($model, 'age_end') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'gallery_id') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'time_to_prepare') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'hash') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
