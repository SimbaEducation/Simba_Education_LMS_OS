<?php
use yii\helpers\Url;

/**
* Variables to control the selection of side bar.
* @todo : enhancement
*/
$activeController = strtolower($this->context->id);
$activeAction = strtolower($this->context->action->id);
$activeControllerAction = $activeController.'.'.$activeAction;
$activeCssClass = 'active';
$openCssClass = 'open';
$emptyCssClass = ' ';
$notActiveCssClass = '';
?>
<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
				<li class="start <?= ($activeController === 'site') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::home() ?>">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>

				

				<li class="<?= ($activeController === 'clients') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['/clients/index']) ?>">
						<i class="icon-layers "></i>
						<span class="title">Clients </span>
					</a>
				</li>

				<li class="<?= (in_array($activeController, ['user','user-type'])) ? $activeCssClass.$emptyCssClass.$openCssClass : $notActiveCssClass; ?>">
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">User Manager</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="<?= ($activeControllerAction === 'user.index') ? $activeCssClass : $notActiveCssClass; ?>">
							<a href="<?= Url::to(['/user/index']) ?>">
							Users</a>
						</li>
						<li class="<?= ($activeControllerAction === 'user-type.index') ? $activeCssClass : $notActiveCssClass; ?>">
							<a href="<?= Url::to(['/user-type/index']) ?>">
							User Types</a>
						</li>
					</ul>
				</li>
				<li class="last">
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Rbac Manager</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?= Yii::$app->getUrlManager()->createUrl('rbac'); ?>">
							RBAC</a>
						</li>
						<li>
							<a href="<?= Yii::$app->getUrlManager()->createUrl('auth-assignment'); ?>">
							Auth Assignment</a>
						</li>
						<li>
							<a href="<?= Yii::$app->getUrlManager()->createUrl('auth-item'); ?>">
							Auth Item</a>
						</li>
						<li>
							<a href="<?= Yii::$app->getUrlManager()->createUrl('auth-item-child'); ?>">
							Auth Item Child</a>
						</li>
						<li>
							<a href="<?= Yii::$app->getUrlManager()->createUrl('auth-rule'); ?>">
							Auth Rule</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->