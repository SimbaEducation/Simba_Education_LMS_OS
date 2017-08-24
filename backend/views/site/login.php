<?php
/**
 * Summary Text
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <div class="form">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <?= $form->field($model, 'username')->textInput(array('placeholder' => 'Username', 'style' => 'padding-left:35px',)); ?>
                </div>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Password', 'style' => 'padding-left:35px',)) ?>
                </div>

                <div class="form-actions">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'rememberMe')->checkbox(); ?>
                    </div>
                    <div class="col-lg-7" style="padding-right:0px !important">
                        <?= Html::submitButton('Login', ['class' => 'btn green-haze pull-right', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p>
                        no worries, click <a href="javascript:;" id="forget-password">
                            here </a>
                        to reset your password.
                    </p>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>  
</div>
