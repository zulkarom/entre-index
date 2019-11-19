<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
?>

<i>The Leading Shariah Screening E-Commerce</i>
<br />

<h4 align="center">JAKIM Certificate Information</h4>
<div align="center" id="con-ets">
<?= Html::img(    Url::to('@web/images/loading.gif'), ['alt' => 'LOADING...', 'width' => 200]) ?>
</div> 


<br />

<div align="center">
<button id="btn-continue" style="display:none" type="button" class="btn btn-primary" onclick="javascript:changeParent()" >Continue </button>
</div>


<br /><br />


<script language="javascript"> 
function changeParent() { 
var str = '<h4><strong>JAKIM Certificate Information</strong></h4>' + document.getElementById('con-ets').innerHTML;
window.opener.postMessage(str, 'http://localhost');
window.close();
}
</script> 
<?php 
$script = "
var str_ets = '".Yii::$app->request->get('ets')."';
if(str_ets){
	$.ajax({
	   url: '" . Url::to(['ajax-result-one']) . "',
	   type: 'get',
	   data: {
				ets : str_ets,
				 _csrf : '" . Yii::$app->request->getCsrfToken() . "'
			 },
	   success: function (data) {
		   $('#btn-continue').show();
		   $('#con-ets').html(data);
		  //console.log(data);
	   }
	});
}else{
	$('#btn-continue').show();
	$('#con-ets').html('No ETS Code provided!');
}



 
";


$this->registerJs(
		$script,
		View::POS_READY
	);

?>