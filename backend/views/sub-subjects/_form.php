<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Subjects;

/* @var $this yii\web\View */
/* @var $model backend\models\DomainOfSubject */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
?>


<div class="portlet-body form">
    <div class="form-body">
        <div class="row">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]); ?>

            <?= $form->field($model, 'description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'goal', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'days', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>
           
            <?= $form->field($model, 'subject_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(Subjects::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>
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