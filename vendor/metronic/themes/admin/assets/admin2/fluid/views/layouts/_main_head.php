<?php 
// MetaTags Beigns
$this->registerMetaTag(['charset' => 'utf-8']);
$this->registerMetaTag(['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge']);
$this->registerMetaTag(['content' => 'width=device-width, initial-scale=1.0', 'name' => 'viewport']);
//$this->registerMetaTag(['http-equiv' => 'Content-type', 'content' => 'text/html; charset=utf-8']);
$this->registerMetaTag(['content' => 'Project Management CRM' , 'name' => 'description']);
$this->registerMetaTag(['content' => 'Granjur Technologies', 'name' => 'author']);
echo yii\helpers\Html::csrfMetaTags();
// MetaTags Ends

// PageTitle Begins
echo yii\helpers\Html::tag('title', yii\helpers\Html::encode($this->title));
// PageTitle Ends
?>
