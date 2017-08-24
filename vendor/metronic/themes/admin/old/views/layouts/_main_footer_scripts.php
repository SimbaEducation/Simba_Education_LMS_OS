<?php 
use yii\web\View;

$this->registerJs("jQuery(document).ready(function(){ Metronic.init(); Layout.init(); Demo.init(); });", View::POS_END);
