<!-- BEGIN PAGE HEAD -->
<?php 
	if($this->context->pageHeading)
	{
?>
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1><?= $this->context->pageHeading ?><small><?= ($this->context->pageDescription) ? $this->context->pageDescription: '' ?></small></h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<?php
	}
?>
<!-- END PAGE HEAD -->
		