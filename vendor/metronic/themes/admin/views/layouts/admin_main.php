<?php 

use metronic\themes\common\assets\AppAsset as CommonAppAsset;
use metronic\themes\common\assets\ThemeAsset as CommonThemeAsset;
use metronic\themes\admin\assets\AppAsset as AdminAppAsset;
use metronic\themes\admin\assets\ThemeAsset as AdminThemeAsset;
use yii\helpers\Html;

// Register Assets Files Begins
CommonAppAsset::register($this);
AdminAppAsset::register($this);
CommonThemeAsset::register($this);
AdminThemeAsset::register($this);
// Register Assets Files Ends

// Set PageTitle Begins
$this->title = Yii::$app->name . ' | ' . ucfirst(strtolower(Yii::$app->controller->action->id));
// Set PageTitle Ends

// Html Begins
$this->beginPage(); 
?>
<!DOCTYPE html>

<!--[if IE 8]> 
	<?= Html::beginTag('html', ['lang' => Yii::$app->language, 'class' => 'ie8 no-js']) ?>
<![endif]-->
<!--[if IE 9]> 
	<?= Html::beginTag('html', ['lang' => Yii::$app->language, 'class' => 'ie9 no-js']) ?>
<![endif]-->
<!--[if !IE]><!-->
	<?= Html::beginTag('html', ['lang' => Yii::$app->language]) ?>
<!--<![endif]-->

<?php
	
	// Head Begins
	echo Html::beginTag('head');
		echo $this->render('_main_head');
		$this->head();
		$this->registerLinkTag(['rel' => 'shortcut icon' , 'href' => Yii::$app->request->baseUrl . '/favicon.ico']); 
	echo Html::endTag('head');
	// Head Ends

	// Body Begins
	echo Html::beginTag('body', ['class' => 'page-md page-header-fixed page-sidebar-closed-hide-logo']);
		$this->beginBody();
			echo $content;
		$this->endBody();
	echo Html::endTag('body');
	// Body Ends

	echo Html::endTag('html');
	$this->endPage();
	// Html Ends
?>`