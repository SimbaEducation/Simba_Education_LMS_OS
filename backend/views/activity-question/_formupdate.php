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
?>
<div class="portlet-body form">
    <div class="form-body">
        <div class="row">
            <?php
            $form = ActiveForm::begin(['enableClientValidation' => false,
                        'enableAjaxValidation' => false, 'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]);
            ?>

            <?= $form->field($model, 'question', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lo_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(SubSubjects::find()->all(), 'id', 'description'), ['prompt' => 'Select', 'class' => 'form-control bs-select']) ?>

            <?= $form->field($model, 'type', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropdownList(['' => 'Select', '1' => 'Image', '2' => 'Text'], ['class' => 'form-control', 'disabled' => 'disabled', 'onchange' => 'display(this.value);']) /* , ['prompt' => 'Select Data'] */ ?>
            <input type="hidden" maxlength="" value="<?= $model->type ?>" name="ActivityQuestion[type]" class="form-control">
            <div id="text-field" style="display:<?php echo isset($model) && $model->type == 2 ? 'block' : 'none' ?>">
                <?= $form->field($model, 'outcome_1', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'outcome_2', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'outcome_3', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'outcome_4', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>
            </div>
            <div id="image-field" style="display:<?php echo isset($model) && $model->type == 1 ? 'block' : 'none' ?>">
                <?= $form->field($model, 'image_1', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>
                <?php if ($model->type == 1) { ?>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php echo Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model['outcome_1'], ['width' => '120px']) ?>
                    </div>
                    <div style="clear:both"></div>
                <?php } ?>
                <?= $form->field($model, 'image_2', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>
                <?php if ($model->type == 1) { ?>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php echo Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model['outcome_2'], ['width' => '120px']) ?>
                    </div>
                    <div style="clear:both"></div>
                <?php } ?>
                <?= $form->field($model, 'image_3', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>
                <?php if ($model->type == 1) { ?>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php echo Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model['outcome_3'], ['width' => '120px']) ?>
                    </div>
                    <div style="clear:both"></div>
                <?php } ?>
                <?= $form->field($model, 'image_4', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput(['maxlength' => true]) ?>
                <?php if ($model->type == 1) { ?>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php echo Html::img(Yii::getAlias('@web') . '/../uploads/question/' . $model['outcome_4'], ['width' => '120px']) ?>
                    </div>
                    <div style="clear:both"></div>
                <?php } ?>
            </div>
            <?= $form->field($model, 'point_1', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

            <?= $form->field($model, 'point_2', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

            <?= $form->field($model, 'point_3', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

            <?= $form->field($model, 'point_4', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput() ?>

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

<script type="text/javascript">
    function display(val) {
        if (val == '2') {
            $('#text-field').show();
            $('#image-field').hide();
        } else if (val == '1') {
            $('#text-field').hide();
            $('#image-field').show();
        }
        else {
            $('#text-field').hide();
            $('#image-field').hide();
        }
    }
</script>