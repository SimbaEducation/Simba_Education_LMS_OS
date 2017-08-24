<?php 

use client\models\User;
use client\models\Departments;
use yii\helpers\Url;
use common\models\Conversations;

	$departments = [];
	if(Yii::$app->rbac->isProCreator())
		$departments = Departments::getDepartmentsListDataForCurrentClient();
	else
		$departments = User::getCurrentUserDepartmentsListData();

	$conIDs = Departments::getGivenDepartmentsConversationIDs($departments);
?>
<a href="javascript:;" class="page-quick-sidebar-toggler" style="background: transparent none repeat scroll 0% 0% !important;"><i class="icon-login"></i></a>
<div class="page-quick-sidebar-wrapper">
	<div class="page-quick-sidebar">
		<div class="nav-justified">
			<ul class="nav nav-tabs nav-justified">
				<li class="active">
					<a aria-expanded="true" href="#quick_sidebar_tab_1" data-toggle="tab">
					Chat Rooms <span class="badge badge-danger">2</span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane page-quick-sidebar-chat active" id="quick_sidebar_tab_1">
					<div style="position: relative; overflow: hidden; width: auto; height: 309px;" class="page-quick-sidebar-list"><div data-initialized="1" style="overflow: hidden; width: auto; height: 309px;" data-height="309" class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
						<h3 class="list-heading">Departments</h3>
						<ul class="list-items">
							<?php foreach ($departments as $depId => $name) 
							{ 
								echo '
								<li class="media">
									<a href="'.Url::to(["site/chat","id"=> $conIDs[$depId]]).'" style="color:#90A1AF;"> 
										<div class="row">
											<div class="col-md-10"> 
												<div class="media-body">
													<p class="media-heading">'.$name.'</p>
												</div>
											</div>
											<div class="col-md-2">
												<div class="media-status">
													<span class="badge badge-success">'.Conversations::getUserUnreadCount($conIDs[$depId]).'</span>
												</div>
											</div>
										</div>
									</a>
								</li>';
							} ?>
						</ul>
					</div>
					<div style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 109.622px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(221, 221, 221) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
					<!-- <div class="page-quick-sidebar-item">
						<div class="page-quick-sidebar-chat-user">
							<div class="page-quick-sidebar-nav">
								<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
							</div>
							<div style="position: relative; overflow: hidden; width: auto; height: 204px;" class="slimScrollDiv"><div data-initialized="1" style="overflow: hidden; width: auto; height: 204px;" data-height="204" class="page-quick-sidebar-chat-user-messages">
								<div class="post out">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body">
										When could you send me the report ? </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:15</span>
										<span class="body">
										Its almost done. I will be sending it shortly </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body">
										Alright. Thanks! :) </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:16</span>
										<span class="body">
										You are most welcome. Sorry for the delay. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										No probs. Just take your time :) </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body">
										Alright. I just emailed it to you. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										Great! Thanks. Will check it right away. </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body">
										Please let me know if you have any comment. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body">
										Sure. I will check and buzz you if anything needs to be corrected. </span>
									</div>
								</div>
							</div><div style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 60.4884px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
							<div class="page-quick-sidebar-chat-user-form">
								<div class="input-group">
									<input class="form-control" placeholder="Type a message here..." type="text">
									<div class="input-group-btn">
										<button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<!-- <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
					<div style="position: relative; overflow: hidden; width: auto; height: 309px;" class="slimScrollDiv"><div data-initialized="1" style="overflow: hidden; width: auto; height: 309px;" data-height="309" class="page-quick-sidebar-alerts-list">
						<h3 class="list-heading">General</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 New order received with <span class="label label-sm label-danger">
												Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 30 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
												Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 2 hours
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 IPO Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
						</ul>
						<h3 class="list-heading">System</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 New order received with <span class="label label-sm label-success">
												Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 30 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 You have 5 pending membership that requires a quick review.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 24 mins
									</div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-warning">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
												Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 2 hours
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 IPO Report for year 2013 has been released.
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										 20 mins
									</div>
								</div>
								</a>
							</li>
						</ul>
					</div><div style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
				</div> -->
				<!-- <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
					<div style="position: relative; overflow: hidden; width: auto; height: 309px;" class="slimScrollDiv"><div data-initialized="1" style="overflow: hidden; width: auto; height: 309px;" data-height="309" class="page-quick-sidebar-settings-list">
						<h3 class="list-heading">General Settings</h3>
						<ul class="list-items borderless">
							<li>
								 Enable Notifications <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-success">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" checked="" data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
							<li>
								 Allow Tracking <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-info">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
							<li>
								 Log Errors <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-danger">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" checked="" data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
							<li>
								 Auto Sumbit Issues <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-warning">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
							<li>
								 Enable SMS Alerts <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-success">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" checked="" data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
						</ul>
						<h3 class="list-heading">System Settings</h3>
						<ul class="list-items borderless">
							<li>
								 Security Level
								<select class="form-control input-inline input-sm input-small">
									<option value="1">Normal</option>
									<option value="2" selected="">Medium</option>
									<option value="e">High</option>
								</select>
							</li>
							<li>
								 Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5">
							</li>
							<li>
								 Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560">
							</li>
							<li>
								 Notify On System Error <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-danger">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" checked="" data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
							<li>
								 Notify On SMTP Error <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-warning">ON</span><span class="bootstrap-switch-label">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input class="make-switch" checked="" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF" type="checkbox"></div></div>
							</li>
						</ul>
						<div class="inner-content">
							<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
						</div>
					</div><div style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
				</div>
 -->			</div>
		</div>
	</div>
</div>