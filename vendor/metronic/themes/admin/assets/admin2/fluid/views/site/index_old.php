<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Record Listing</span>
								<span class="caption-helper">manage records...</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-default btn-circle">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								New Order </span>
								</a>
								<div class="btn-group">
									<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Tools </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Export to Excel </a>
										</li>
										<li>
											<a href="javascript:;">
											Export to CSV </a>
										</li>
										<li>
											<a href="javascript:;">
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="javascript:;">
											Print Invoices </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<?php \yii\widgets\Pjax::begin(['timeout' => 10000, 'clientOptions' => ['container' => 'pjax-container'], 'enablePushState' => false]); ?>
							<?= yii\grid\GridView::widget([
									'dataProvider' => $dataProvider,
									'filterModel' => $searchModel,
									'columns' => [
										['class' => 'yii\grid\SerialColumn'],

										'id',
										'username',
										'email',
										['class' => 'yii\grid\ActionColumn'],
									],
									'options' => ['id' => 'user-grid','class'=>'table-container'],
									'filterRowOptions' => ['class' => 'filter', 'role' => 'row'],
									//'summaryOptions' => ['class' => 'row'],
									'tableOptions' =>['class' => 'table table-striped table-bordered table-hover'],
									'rowOptions'=>function ($model, $key, $index, $grid)
									{
										$class = $index % 2 ? 'even' : 'odd';
										return array('class' => $class, 'role' => 'row');
									},
								]) ?>
								<?php \yii\widgets\Pjax::end(); ?>
						</div>
					</div>