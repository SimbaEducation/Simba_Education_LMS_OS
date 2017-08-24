<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\TypesOfCycles;
use backend\models\ActivityCategories;

/* @var $this yii\web\View */
/* @var $model backend\models\ActivityCategories */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
$counter = 0;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'name' => 'cycle', 'id' => 'cycle', 'class' => 'form-horizontal']]);
?>

<div class="form-body">
    <?= $form->field($model, 'name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type_of_cycle_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(TypesOfCycles::find()->all(), 'id', 'name'), ['prompt' => 'Select', 'class' => 'form-control', 'disabled' => 'disabled']) ?>
    <input type="hidden" value="<?= $model->type_of_cycle_id ?>" name="CycleTemplates[type_of_cycle_id]" class="form-control" id="cycletemplates-type_of_cycle_id">
</div>

<div class="clearfix" style="margin-bottom:10px;"></div>
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

