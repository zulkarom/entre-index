<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
$array = array();
$check = array();
if($query){
	foreach($query as $row){
	$product = array();
	$product['id'] = $row->id;
	$check[] =  $row->id;
	echo '<br /><div id="ajax-ets-result-'.$row->id .'">';
	echo 'Product: ' . $row->product_name;
	$product['product_name'] = $row->product_name;
	echo '<br />';
	
	echo 'Company: ' . $row->company;
	$product['company'] = $row->company;
	echo '<br />
	Expired Date:  
	';
	$date_format = date('d M Y', strtotime($row->expired_date));
	echo $date_format;
	$product['expired_date'] = $date_format;
	
		if(strtotime($row->expired_date) > time()){
			$status = "ACTIVE";
			$unknown = 0;
			$logo = 'logo-halal.png';
			$img = Html::img(    Url::to('@web/images/'.$logo, true), ['alt' => 'ACTIVE', 'width' => 100]);
		}else{
			$unknown = 1;
			$status = "NOT ACTIVE / UNKNOWN";
			$logo = 'logo-unknown.png';
			$img = Html::img(    Url::to('@web/images/'.$logo, true), ['alt' => 'UNKNOWN', 'width' => 100]);
		}
	$product['status'] = $status;
	$product['unknown'] = $unknown;
	echo '<br />';
	echo '<b>STATUS: ' . $status;
	echo '</b><br />';
	echo $img;
	$product['img'] = $logo;
	echo '<br /></div>';
	$array[] = $product;
	}
	
	echo '<br/>Source: <a href="http://www.halal.gov.my/" target="_blank"><i>Halal Malaysian Portal</i></a><br />';
}else{
	echo 'No result found.';
}

if($arr){
	foreach($arr as $v){
		if(!in_array($v, $check)){
			if($v){
				$product = array();
				$product['id'] = $v;
				$product['product_name'] = '?';
				$product['company'] = '?';
				$product['expired_date'] ='?';
				$product['unknown'] = 1;
				$product['status'] = "NOT ACTIVE / UNKNOWN";
				$logo = 'logo-unknown.png';
				$product['img'] = $logo;
				$array[] = $product;
			}
		}
	}
}

echo '<span id="ets-json" class="hidden">'. json_encode($array) .'</span>';

?>