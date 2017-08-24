<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CyclesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cycles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'age_start') ?>

    <?= $form->field($model, 'age_end') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'segment_id') ?>

    <?php // echo $form->field($model, 'cycle_template_id') ?>

    <?php // echo $form->field($model, 'short_description') ?>

    <?php // echo $form->field($model, 'long_description') ?>

    <?php // echo $form->field($model, 'thumbnail') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
