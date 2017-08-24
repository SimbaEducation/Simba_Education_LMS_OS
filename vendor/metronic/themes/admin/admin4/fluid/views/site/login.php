<?php

use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use common\components\ImageComponent;
?>
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="<?= Url::to(['/site/index']) ?>">
        <img src="<?php echo Yii::getAlias('@web') . '/../uploads/settings/simba.jpg' ?>" alt="logo" class="logo-default" style="max-height:75px;width:100px;margin-top:0px;"/> 
    </a>

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="<?= Url::to(['site/login']) ?>" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        <!--<h3 class="form-title">Sign In</h3>-->
        <div class="form-title">
            <span class="form-title">Welcome.</span>
            <span class="form-subtitle">Please login.</span>
        </div>
        <?php if (Yii::$app->session->getFlash('error')): ?>
            <div class="alert alert-danger" style="">
                <button class="close" data-close="alert"></button>
                <span>
                    <?= Yii::$app->session->getFlash('error'); ?>
                </span>
            </div>
        <?php endif; ?>
        <div class="alert alert-danger display-hide" style="<?= $model->hasErrors() ? 'display:block;padding:15px;margin-bottom:20px;' : 'display:none;' ?>">
            <!--<button class="close" data-close="alert"></button>-->
            <span>Error : Invalid Username/Password</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="LoginForm[username]"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="LoginForm[password]"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">Login</button>
            <!--<label class="rememberme check">
            <input type="checkbox" name="LoginForm[remember]" value="1"/>Remember </label>
            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>-->
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme check">
                    <input type="checkbox" name="LoginForm[remember]" value="1" />Remember me </label>
            </div>
            <div class="pull-right forget-password-block">
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="<?= Url::to(['site/login']) ?>" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        <h3 style="color:white">Forget Password ?</h3>
        <div class="alert alert-danger display-hide" style="<?= $modelForgot->hasErrors() ? 'display:block;' : 'display:none;' ?>">
            <button class="close" data-close="alert"></button>
            <span><?= Yii::$app->session->getFlash('error'); ?></span>
        </div>
        <div class="alert alert-success display-hide" style="<?= Yii::$app->session->hasFlash('success') ? 'display:block;' : 'display:none;' ?>">
            <button class="close" data-close="alert"></button>
            <span>
                <?= Yii::$app->session->getFlash('success'); ?>
            </span>
        </div>
        <p style="color:white">
            Enter your e-mail address below to reset your password.
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="PasswordResetRequestForm[email]"/>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
</div>
<div class="copyright">
    <?= (!empty(Yii::$app->settings->getValue('general', 'footerText')) ? Yii::$app->settings->getValue('general', 'footerText') : '2015 &copy; SimbaCPM') ?>
</div>

<?php 
	$this->registerJs("
jQuery(document).ready(function() {     
//Metronic.init(); // init metronic core components
//Layout.init(); // init current layout
Login.init();
//Demo.init();

var check = $check;
if(check){
    $('#forget-password').click();
}

});",View::POS_END);