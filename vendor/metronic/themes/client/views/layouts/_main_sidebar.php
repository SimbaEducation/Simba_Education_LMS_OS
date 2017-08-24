<?php
use yii\helpers\Url;
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
					<li class="start active ">
						<a href="<?= Yii::$app->getUrlManager()->createUrl('site'); ?>">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i>
						<span class="title">Users</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
                                <a href="<?= Url::to(['user/index'])?>">
								<i class="icon-user"></i>
								Users</a>
							</li>
							<li>
                                <a href="<?= Url::to(['user-type/index'])?>">
								<i class="icon-list"></i>
								User Type</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="<?= Url::to(['departments/index']); ?>">
						<i class="icon-tag"></i>
						<span class="title">Departments</span>
						</a>
					</li>
                    <li>
						<a href="javascript:;">
						<i class="icon-layers"></i>
						<span class="title">RBAC Manager</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
                                                            <a href="<?= Url::to(['auth-assignment/index'])?>">
								Auth Assignment</a>
							</li>
                                                        <li>
                                                            <a href="<?= Url::to(['auth-item/index'])?>">
								Auth Items</a>
							</li>
                                                        <li>
                                                            <a href="<?= Url::to(['auth-item-child/index'])?>">
								Auth Items Child</a>
							</li>
                                                        <li>
                                                            <a href="<?= Url::to(['auth-rule/index'])?>">
								Auth Rule</a>
							</li>
							
						</ul>
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->