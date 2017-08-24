<!-- BEGIN PAGE BREADCRUMB -->
<?php
	// if(isset($breadcrumb['url']))
	if(isset($this->params['breadcrumbs']) && !empty($this->params['breadcrumbs']))
	{
?>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<?php
				/**
				 * Please use the yii sytnax for setting breadcrumbs
				 *
				 * Example
				 * ---------
				 * $this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
				 * $this->params['breadcrumbs'][] = $this->title;
				 *
				 * @todo : enhancement
				 */
				$lastItem = end($this->params['breadcrumbs']);
				foreach ($this->params['breadcrumbs'] as $key => $breadcrumb)
				{
					$label = '';
					$url = '#';

					if(is_array($breadcrumb))
					{
						$label = $breadcrumb['label'];

						if(isset($url,$breadcrumb['url']))
							$url = yii\helpers\Url::to($breadcrumb['url']);
					}
					else
						$label = $breadcrumb;

					if($lastItem == $breadcrumb)
						echo "<li><a href='$url'>$label</a></li>";
					else
					{
						echo "<li><a href='$url'>$label</a><i class='fa fa-angle-right'></i></li>";	
					}
				}
			?>
		</ul>
	</div>
	<?php
		}
	?>
<!-- END PAGE BREADCRUMB -->