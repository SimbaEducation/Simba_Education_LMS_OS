<?php 
use yii\helpers\Html;

if(!function_exists ('renderReason'))
{
	function renderReason($reasonMessage)
	{
		$html = '<ul>';

		echo '<br><br>';
		echo Html::tag('span','<b>Reason : </b>');
		foreach ($reasonMessage as $key => $message)
		{
			$html .= '<li>' . $message . '</li>';
		}

		$html .= '</ul>';
		echo Html::tag('p',$html);
	}
}

?>

<?php if(Yii::$app->session->hasFlash('flashMessages')): 
	
	$message = Yii::$app->session->getFlash('flashMessages');
	if(isset($message, $message['type'], $message['message']))
	{
		switch ($message['type'])
		{
			case 'success':
				echo Html::beginTag('div', ['class'=>"alert alert-success alert-dismissable"]);
					echo Html::button('',['class'=>"close text-default", 'data-dismiss'=>"alert", 'aria-hidden'=>"true"]);
					echo Html::tag('span','<b>Success ! </b>'.$message['message']);

					if(isset($message['reason']))
						renderReason($message['reason']);

				echo Html::endTag('div');
			break;
			
			case 'error';
				echo Html::beginTag('div', ['class'=>"alert alert-danger alert-dismissable"]);
					echo Html::button('',['class'=>"close text-default", 'data-dismiss'=>"alert", 'aria-hidden'=>"true"]);
					echo Html::tag('span','<b>Error ! </b>'.$message['message']); 

					if(isset($message['reason']))
						renderReason($message['reason']);

				echo Html::endTag('div');
			break;

			default:
			break;
		}
	}
	endif; 
?>