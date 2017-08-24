<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\User;
use backend\models\UserType;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();

$type = array();
if (isset($model->postTypes)) {
    foreach ($model->postTypes AS $val) {
        $type[] = $val->type_id;
    }
}
$model->type = $type;
?>

<div class="portlet-body form">
    <div class="form-body">
        <div class="row">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]); ?>
            <?= $form->field($model, 'name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6, 'class' => 'summernote_1']) ?>
            <?= $form->field($model, 'category_id', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), ['onchange' => 'display(this.value);', 'prompt' => 'Select', 'class' => 'form-control bs-select']) ?>
            <?= $form->field($model, 'type', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(UserType::find()->all(), 'id', 'label'), ['onchange' => 'display(this.value);', 'id' => 'my_multi_select1', 'class' => 'form-control multi-select', 'multiple' => 'multiple']) ?>

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
<?php
$this->registerJs("
jQuery(document).ready(function() { 
     $('.js-example-basic-single').select2();
       $('.summernote_1').summernote({height: 200});
});
");
?>