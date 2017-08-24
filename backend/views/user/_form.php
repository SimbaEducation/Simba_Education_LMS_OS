<?php
/**
 * Summary Text
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\UserType;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
?>

<div class="user-form">

    <?= $this->renderFile(Yii::$app->params['flashMessageFile']) ?>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal form-row-seperated']]); ?>

    <div class="form-body">
        <?= $form->field($model, 'username', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'email', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'password', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->passwordInput(['maxlength' => 250]) ?>

        <?= $form->field($model, 'first_name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'last_name', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'about', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'user_type', ['template' => $template, 'labelOptions' => ['class' => $labelClass]])->dropDownList(ArrayHelper::map(UserType::find()->all(), 'id', 'label'), ['onchange' => 'display(this.value);','prompt'=>'Select','class'=>'form-control bs-select']) ?>
    </div>

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

        <?php
        $this->registerJs("
jQuery(document).ready(function() { });



");
        ?>