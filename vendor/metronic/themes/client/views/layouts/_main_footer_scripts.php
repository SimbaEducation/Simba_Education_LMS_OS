<?php 
use yii\web\View;

$this->registerJs("jQuery(document).ready(function(){ Metronic.init(); Layout.init(); Demo.init(); QuickSidebar.init(); Index.init();   Index.initDashboardDaterange(); Tasks.initDashboardWidget(); Index.initJQVMAP(); Index.initCalendar();  Index.initCharts(); Index.initChat();Index.initMiniCharts(); });", View::POS_END);
