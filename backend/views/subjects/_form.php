<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Standards;
use backend\models\DomainOfSubject;
use kartik\slider\Slider;
use backend\models\Subjects;


/* @var $this yii\web\View */
/* @var $model backend\models\ActivityCategories */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();

$prerequisites = array();
if (isset($model->subjectRequisites)) {
    foreach ($model->subjectRequisites AS $val) {
        $prerequisites[] = $val->subject_prereq_id;
    }
}
$model->prerequisites = $prerequisites;

if (isset($model->age_short) && !empty($model->age_short)) {
    $model->age_short = $model->age_short . ';' . $model->age_end;
} else {
    $model->age_short = '10;40';
}
?>


<div class="portlet-body form">
    <div class="form-body">
        <div class="row" style="margin:0px 20px;">


            <?php $form = ActiveForm::begin(['options' => ['id' => 'subjects-file-form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]); ?>
         
            <?= $form->field($model, 'name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'age_short', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['id' => 'range_3', 'value' => $model->age_short]) ?>

            <?= $form->field($model, 'standard', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(Standards::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>

            <?= $form->field($model, 'short_description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'long_description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'domain', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(DomainOfSubject::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>

            <?= $form->field($model, 'notes', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>
            <?php $prerequisites = isset($model->id) ? $model->id : 0 ?>
            <?= $form->field($model, 'prerequisites', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(Subjects::find()->where('id != ' . $prerequisites . ' ')->all(), 'id', 'name'), ['onchange' => 'display(this.value);', 'id' => 'my_multi_select1', 'class' => 'form-control multi-select', 'multiple' => 'multiple']) ?>

            <div class="form-actions" style="background-color: #f5f5f5;margin: 0;padding: 20px 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-offset-5 col-md-6">
                                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </div>
</div>


