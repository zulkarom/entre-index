<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
?>

<i>The Leading Shariah Screening E-Commerce</i>
<br />
<div id="page1">
<h4 align="center">JAKIM Certificate Information</h4>
<div align="center" id="con-ets">
<?= Html::img(    Url::to('@web/images/loading.gif'), ['alt' => 'LOADING...', 'width' => 200]) ?>
</div> 


<br />

<div align="center">
<button id="btn-continue" style="display:none" type="button" class="btn btn-primary" onclick="javascript:page2()" >Continue </button>
</div>

</div>

<div id="page2" style="display:none">

<br /><br />
<div style="width: 300px; margin: 0 auto;"><b>Please select related financial institution that will be used in payment process</b>

<p><i>It may refer to:<br />
- The issuer of Credit / Debit Card<br />
- The bank used in Online Banking Transfer<br />
</i>
</p>

<div class="form-group">
<label><input type="radio" name="finance" value="1" /> Islamic Financial Institution</label><br />
<label><input type="radio" name="finance" value="0" /> Conventional Financial Institution</label><br />
<label><input type="radio" name="finance" value="2" /> Not Applicable</label> <br /></div>
</div>
<br /><br />
  
  <div align="center">
  <input type="hidden" id="finance-result" name="finance-result" value="-1" />

<button id="btn-continue" type="button" class="btn btn-success" onclick="javascript:finance()" >Finish </button>
</div>
  

</div>

<br /><br />



<script language="javascript"> 
function page2(){
	document.getElementById('page1').style.display = 'none';
	document.getElementById('page2').style.display = '';
}
function updateParent() { 
	var str = document.getElementById('ets-json').innerHTML;
	var obj = JSON.parse(str);
	var id;
	var product;var status;
	var unknown = 0;
	var url_image = '<?php echo Url::to('@web/images/', true);?>';

	// loop setaip produk
	var arr_products = [];
	
	for(i=0;i<obj.length;i++){
		
		id = obj[i].id;
		unknown += parseInt(obj[i].unknown);
		
		info = 'Product: ' + obj[i].product_name + '<br>Company: ' + obj[i].company + '<br>Expired Date: ' + obj[i].expired_date ;
		//window.opener.document.getElementById('ets-result-'+id).innerHTML= product;
		
		url = url_image + obj[i].img;
		
		status = '<b>STATUS: ' + obj[i].status + '</b><br><img src="' + url + '" width="70" /><br>' ;
		//window.opener.document.getElementById('ets-status-'+id).innerHTML= status;
		
		var product = {id: id, info: info, status: status};
		arr_products.push(product);
		
	}
	
	//alert about product
	var has; var product;
	var alert_product;
	if(unknown > 0){
		if(unknown == 1){
			has = 'has';
			pro = 'product';
		}else{
			has = 'have';
			pro = 'products';
		}
		alert_product = '<div class="alert alert-danger"><i class="fa fa-warning"></i> It shows that <b>' + unknown + '</b> ' + pro + ' ' + has + ' halal status of not active / unknown.</div>';
	}else{
		if(i == 1){
			has = 'has';
			pro = 'product';
		}else{
			has = 'have';
			pro = 'products';
		}
		alert_product = '<div class="alert alert-success"><i class="fa fa-check"></i> It shows that the ' + pro + ' ' + has + ' active JAKIM halal certificate.</div>';
	}

	var finance = document.getElementById('finance-result').value;
	
	var selected_finance;
	var alert_finance;
	if(finance == 0){
		alert_finance = '<div class="alert alert-danger"><i class="fa fa-warning"></i> The payment through the intended financial institution is not inline with Islamic guideline.</div>';
		selected_finance = ': Conventional Financial Institution';
	}else if(finance == 1){
		alert_finance = '<div class="alert alert-success"><i class="fa fa-check"></i> The payment through the intended financial institution is inline with Islamic guideline.</div>';
		selected_finance = ': Islamic Financial Institution';
	}else{
		alert_finance = '<div class="alert alert-info"><i class="fa fa-info"></i> No financial institution involved.</div>';
		selected_finance = ': Not applicable';
	}
	
	
	
	window.opener.postMessage({products:arr_products, alert_finance:alert_finance, selected_finance: selected_finance, alert_product: alert_product, img_unknown:url_image + 'logo-unknown.png'}, 'http://localhost');

	window.close();
}
function finance(){
	var finance = -1;
	var fin = document.getElementsByName('finance');
	for(i=0;i<fin.length;i++){
		if(fin[i].checked){
			finance = fin[i].value;
			document.getElementById('finance-result').value = finance;
			break;
		}
	}
	
	if(finance == -1){
		alert('Please select one');
	}else{
		updateParent();
	}
}
</script> 
<?php 

$kira = count(Yii::$app->request->get('ets'));


$script = "


var kira = ". $kira .";
if(kira > 0){
	$.ajax({
	   url: '" . Url::to(['ajax-result-checkout']) . "',
	   type: 'post',
	   data: {
				ets : ". json_encode(Yii::$app->request->get('ets')) .",
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