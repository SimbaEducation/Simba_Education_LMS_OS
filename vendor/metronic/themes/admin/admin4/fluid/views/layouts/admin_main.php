<?php 

use metronic\themes\common\assets\AppAsset as CommonAppAsset;
use metronic\themes\common\assets\ThemeAsset as CommonThemeAsset;
use metronic\assets\select2\Select2Asset as Select2Asset;
use metronic\assets\select2\Select2PluginAsset as Select2JsAsset;
use metronic\themes\admin\admin4\fluid\assets\AppAsset as AdminAppAsset;
use metronic\themes\admin\admin4\fluid\assets\ThemeAsset as AdminThemeAsset;
use metronic\components\LayoutComponent;
use yii\helpers\Html;
use yii\helpers\Url;

// Register Assets Files Begins

CommonAppAsset::register($this);
AdminAppAsset::register($this);
CommonThemeAsset::register($this);  
AdminThemeAsset::register($this);
Select2Asset::register($this);        
Select2JsAsset::register($this); 
// Register Assets Files Ends

// Set PageTitle Begins
$this->title = LayoutComponent::buildTitle(Yii::$app->name, $this->context->action->id);
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
			echo $this->render('_main_header');
			echo Html::tag('div','', ['class' => 'clearfix']);
			echo Html::beginTag('div', ['class' => 'page-container']);
				echo $this->render('_main_sidebar');
					echo Html::beginTag('div', ['class' => 'page-content-wrapper']);
						echo Html::beginTag('div', ['class' => 'page-content']);
							echo $this->render('_main_page_head');
							echo $this->render('_main_breadcrumbs');
								echo Html::beginTag('div', ['class' => 'row']);
									echo Html::beginTag('div', ['class' => 'col-md-12']);
										// Action Content Begins
										echo $content;
										// Action Content Ends
									echo Html::endTag('div');
								echo Html::endTag('div');
						echo Html::endTag('div');
					echo Html::endTag('div');
			echo Html::endTag('div');
			echo $this->render('_main_footer');
			echo $this->render('_main_footer_scripts');
		$this->endBody();
	echo Html::endTag('body');
	// Body Ends

	echo Html::endTag('html');
	$this->endPage();
	// Html Ends
?>