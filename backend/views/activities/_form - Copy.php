<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\SubSubjects;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();


if (isset($model->age_start) && !empty($model->age_start)) {
    $model->age_start = $model->age_start . ';' . $model->age_end;
} else {
    $model->age_start = '10;40';
}
?>



<div class="portlet light bordered" id="form_wizard_1">

    <div class="row">
        <?php
        $form = ActiveForm::begin(['enableClientValidation' => true,
                    'enableAjaxValidation' => true,
                   
                    'options' => ['enctype' => 'multipart/form-data', 'id' => 'submit_form', 'class' => 'form-horizontal']]);
        ?>
        <div class="form-wizard">
            <div class="form-body">
                <ul class="nav nav-pills nav-justified steps">
                    <li>
                        <a href="#tab1" data-toggle="tab" class="step">
                            <span class="number"> 1 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Activities </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                            <span class="number"> 2 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Design</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab" class="step active">
                            <span class="number"> 3 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Gallery </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                            <span class="number"> 4 </span>
                            <span class="desc">
                                <i class="fa fa-check"></i> Confirm </span>
                        </a>
                    </li>
                </ul>
                <div id="bar" class="progress progress-striped" role="progressbar">
                    <div class="progress-bar progress-bar-success"> </div>
                </div>
                <div class="tab-content">
                    <div class="alert alert-danger display-none">
                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                    </div>
                    <div class="alert alert-success display-none">
                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! 
                    </div>
                    <div class="tab-pane active" id="tab1">

                        <?= $form->field($model, 'age_start', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['id' => 'range_3', 'value' => $model->age_start]) ?>

                        <?= $form->field($model, 'name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                        <div class="form-group ">
                            <label class="control-label col-md-3">Picture</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                    <div>
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="Activities[picture]"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?= $form->field($model, 'description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'category', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'time_to_prepare', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

                        <?= $form->field($model, 'duration', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>


                        <?= $form->field($model, 'notes', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>
                    </div>
                </div>
                <div class="form-actions" style="background-color: #f5f5f5;margin: 0;padding: 20px 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
<script>

</script>