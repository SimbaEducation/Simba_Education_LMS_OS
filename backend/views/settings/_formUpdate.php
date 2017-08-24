<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]); ?>

    <?= $form->field($model, 'settingName', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['rows' => 255, 'disabled' => 'disabled']) ?>

    <div id="image-field" style="display:<?php echo isset($model) && $model->type == 2 ? 'block' : 'none' ?>">    
        <?= $form->field($model, 'image', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->fileInput() ?>
    </div>
    <?php if ($model->type == 1) { ?>
        <div id="text-field" style="display:<?php echo isset($model) && $model->type == 1 ? 'block' : 'none' ?>">
            <?= $form->field($model, 'settingValue', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['rows' => 255]) ?>
        </div>
    <?php } ?>
    <?php if ($model->type == 3) { ?>
        <div id="text-area" style="display:<?php echo isset($model) && $model->type == 3 ? 'block' : 'none' ?>"> 
            <?= $form->field($model, 'settingValueText', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6, 'class' => 'summernote_1']) ?>
        </div>
    <?php } ?>

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

<script>
    function display(val) {
        if (val == '1') {
            $('#text-field').show();
            $('#image-field').hide();
        }
        else {
            $('#text-field').hide();
            $('#image-field').show();
        }
    }

</script>
<?php
$this->registerJs("
jQuery(document).ready(function() {  
    $('.summernote_1').summernote({height: 200});
    
});



");
?>

