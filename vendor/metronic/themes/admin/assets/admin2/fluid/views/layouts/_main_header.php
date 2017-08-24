<?php
// comment
use yii\helpers\Url;
use yii\helpers\Html;
use client\models\Notification;
use client\models\NotificationDetail;

$newNotifications = Notification::getNewTotal();
$topNotifications = NotificationDetail::getTopNotifications();
?>
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="#">
				<?php echo Html::img((!empty(Yii::$app->settings->getValue('general','headerLogo')) ? '@web/assets_c/images/logo-new.png': '@web/assets_b/images/logo-light.png'), ['alt'=>'logo', 'class'=>'logo-default','width'=>'100px','style'=>'max-height: 75px;']) ?>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<!-- <div class="page-actions">
			<div class="btn-group hide">
				<button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
						<i class="icon-user"></i> New User </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i> New order </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs">Create&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
						<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>
				</ul>
			</div>
		</div> -->
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<!-- <form class="search-form search-form-expanded" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form> -->
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<span class="badge badge-default">
						<?= $newNotifications ?>
						</span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold"><?= $newNotifications ?> pending</span> notifications</h3>
								<a href="<?= Url::to(['/site/notifications']) ?>">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<?php
										if(!empty($topNotifications))
										{
											$iconList = NotificationDetail::getIconListForVerbs();

											foreach ($topNotifications as $notification)
											{
												$icon = $iconList[$notification->ndet_verb];

												if($notification->isComment())
													$icon = 'fa fa-comments-o';
												elseif($notification->isFileUpload())
													$icon = 'fa fa-file-o';
									?>
												<li>
													<a href="<?= $notification->buildUrl() ?>">
													<span class="time"><?= $notification->getReadableTime() ?></span>
													<span class="details">
													<span class="label label-sm label-icon label-success">
													<i class="<?= $icon ?>"></i>
													</span>
													<?= $notification->buildMessage() ?></span>
													</a>
												</li>
									<?php
											}
										}
									?>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="<?= Yii::getAlias('@web/assets_c/images/avatar.png') ?>"/>
						<span class="username username-hide-on-mobile">
						<?= common\models\User::getUsername() ?> </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li style="<?= $this->context->params['displayOption'][(int) $this->context->canAccess('user','profile')] ?>">
								<a href="<?= Url::to(['/user/profile']) ?>">
								<i class="icon-user"></i> My Profile </a>
							</li>
							<li style="<?= $this->context->params['displayOption'][(int) $this->context->canAccess('settings','index')] ?>">
								<a href="<?= Url::to(['/settings/index']) ?>">
								<i class="fa fa-cogs"></i>Settings</a>
							</li>
<!-- 							<li style="<?= $this->context->params['displayOption'][(int) $this->context->canAccess('site','chat')] ?>">
								<a href="<?= Url::to(['/site/chat']) ?>">
								<i class="fa fa-comment"></i>Chat Rooms</a>
							</li> -->
							<!--<li class="dropdown-submenu">
								<a href="javascript:;">
									<i class="icon-settings"></i>
									<span class="title">Settings</span>
									<!-- <span class="arrow "></span>
									<span class="selected"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a href="javascript:;">
											<i class="icon-users"></i>
											<span class="title">Users</span>
											<!-- <span class="arrow "></span>
											<span class="selected"></span>
										</a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?= Url::to(['/user/index']); ?>">
												Users</a>
											</li>
											<li>
												<a href="<?= Url::to(['/user-type/index']); ?>">
												User Types</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="<?= Url::to(['departments/index']); ?>">
										<i class="icon-tag"></i>
										<span class="title">Departments</span>
										<span class="selected"></span>
										</a>
									</li>
								</ul>
							</li>-->
							<li class="divider"></li>
							<li>
								<a href="<?= Url::to(['site/logout']); ?>">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN  -->
					<li class="dropdown dropdown-extended quick-sidebar-toggler">
	                    <span class="sr-only">Toggle Quick Sidebar</span>
	                    <i class="icon-logout"></i>
	                </li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->