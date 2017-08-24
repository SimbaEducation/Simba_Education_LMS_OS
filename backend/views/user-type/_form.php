<?php
/**
 * Summary Text
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserType */
/* @var $form yii\widgets\ActiveForm */

$template = \metronic\components\LayoutComponent::getFromTemplate();
$labelClass = \metronic\components\LayoutComponent::getFormLabelCssClass();
?>

<div class="user-type-form">

	<?= $this->renderFile(Yii::$app->params['flashMessageFile']) ?>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal form-row-seperated']]); ?>


  	<div class="form-body">
	
		<?= $form->field($model, 'type', ['template' => $template,'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255,'disabled'=>false]) ?>

	    <?= $form->field($model, 'label', ['template' => $template,'labelOptions' => ['class' => $labelClass]])->textInput(['maxlength' => 255]) ?>


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
