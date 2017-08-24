<?php
use yii\helpers\Url;
use client\models\Projects; // THE WORST MISTAKE EVER

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

// I declare let no one use this template again :D
$iconSet = [
	'dashboard' => 'icon-home', 
	'projects' => 'fa fa-files-o',
	'vendors' => 'icon-drawer',
	'items' => 'icon-list',
	'purchaseorders' => 'icon-basket',
	'budget' => 'fa fa-money'
];
$sideBar = Yii::$app->rbac->getClientEndSideBar();
// end decleration 
?>
<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start"></li>
				<!--<li class="start <?= ($activeController === 'site') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::home(); ?>">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
					</a>
				</li>-->
				
<!-- 				<li class="<?= (in_array($activeController, ['user','user-type'])) ? $activeCssClass.$emptyCssClass.$openCssClass : $notActiveCssClass; ?>">
					<a href="javascript:;">
						<i class="icon-users"></i>
						<span class="title">Users</span>
						 <span class="arrow "></span> 
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?= ($activeControllerAction === 'user.index') ? $activeCssClass : $notActiveCssClass; ?>">
							<a href="<?= Url::to(['/user/index']); ?>">
							Users</a>
						</li>
						<li class="<?= ($activeControllerAction === 'user-type.index') ? $activeCssClass : $notActiveCssClass; ?>">
							<a href="<?= Url::to(['/user-type/index']); ?>">
							User Types</a>
						</li>
					</ul>
				</li> -->
				<!--<li class="<?= (in_array($activeController, ['user','user-type','departments'])) ? $activeCssClass.$emptyCssClass.$openCssClass : $notActiveCssClass; ?>">
					<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Settings</span>
						<!-- <span class="arrow "></span>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?= (in_array($activeController, ['user','user-type'])) ? $activeCssClass.$emptyCssClass.$openCssClass : $notActiveCssClass; ?>">
							<a href="javascript:;">
								<i class="icon-users"></i>
								<span class="title">Users</span>
								<!-- <span class="arrow "></span>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li class="<?= ($activeControllerAction === 'user.index') ? $activeCssClass : $notActiveCssClass; ?>">
									<a href="<?= Url::to(['/user/index']); ?>">
									Users</a>
								</li>
								<li class="<?= ($activeControllerAction === 'user-type.index') ? $activeCssClass : $notActiveCssClass; ?>">
									<a href="<?= Url::to(['/user-type/index']); ?>">
									User Types</a>
								</li>
							</ul>
						</li>
						<li class="<?= ($activeController === 'departments') ? $activeCssClass : $notActiveCssClass; ?>">
							<a href="<?= Url::to(['departments/index']); ?>">
							<i class="icon-tag"></i>
							<span class="title">Departments</span>
							<span class="selected"></span>
							</a>
						</li>
					</ul>
				</li>-->
				<!--<li class="<?= ($activeController === 'departments') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['departments/index']); ?>">
					<i class="icon-tag"></i>
					<span class="title">Departments</span>
					<span class="selected"></span>
					</a>
				</li>-->
				<!--<li class="<?= ($activeController === 'projects') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['projects/index']); ?>">
					<i class="fa fa-files-o"></i>
					<span class="title">Projects</span>
					<span class="selected"></span>
					</a>
				</li>
				<li class="<?= ($activeController === 'vendors') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['vendors/index']); ?>">
					<i class="icon-drawer"></i>
					<span class="title">Vendors</span>
					<span class="selected"></span>
					</a>
				</li>
				<li class="<?= ($activeController === 'items') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['items/index']); ?>">
					<i class="icon-list"></i>
					<span class="title">Items</span>
					<span class="selected"></span>
					</a>
				</li>
 				<li class="<?= ($activeController === 'purchase-orders') ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to(['purchase-orders/index']); ?>">
					<i class="icon-basket"></i>
					<span class="title">Purchase Orders</span>
					<span class="selected"></span>
					</a>
				</li>-->
				<?php
					foreach ($sideBar as $key => $item)
					{
				?>
					<li class="<?= ($activeController === $item['active']) ? $activeCssClass : $notActiveCssClass; ?>">
					<a href="<?= Url::to($item['url']); ?>">
					<i class="<?= $iconSet[$key] ?>"></i>
					<span class="title"><?= $item['name'] ?></span>
					<span class="selected"></span>
					<?php if(($item['name'] == 'Projects') && (Projects::allProjectsTaskHistoryUpdated() || Projects::allProjectsHistoryUpdated())) : ?>
						<span class="badge badge-default" style='font-family: "Open Sans",sans-serif;
						    background-color: #14b9d6;
						    color: #ffffff;
						    font-weight: 300;
						    padding: 3px 6px;
						    position: absolute;
						    top: 3px;
						    left: 103px;'> &nbsp;&nbsp;
						</span>
					<?php endif; ?>
					</a>
				</li>
				<?php
					}
				?> 
				<li class="last">
					<!-- <a href="javascript:;">
						<i class="icon-layers"></i>
						<span class="title">RBAC Manager</span>
						<span class="arrow "></span>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li>
                            <a href="<?= Url::to(['auth-assignment/index']); ?>">
							Auth Assignment</a>
						</li>
                        <li>
                            <a href="<?= Url::to(['auth-item/index']); ?>">
							Auth Items</a>
						</li>
                            <li>
                                <a href="<?= Url::to(['auth-item-child/index']); ?>">
							Auth Items Child</a>
						</li>
                        <li>
                            <a href="<?= Url::to(['auth-rule/index']); ?>">
							Auth Rule</a>
						</li>
					</ul> -->
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->