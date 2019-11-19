<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
if($model){
	echo '<br />';
	echo 'Product: ' . $model->product_name;
	echo '<br />';

	echo 'Company: ' . $model->company;
	echo '<br />
	Expired Date:  
	';
	echo date('d M Y', strtotime($model->expired_date));
	echo '<br />';
	echo '<b>STATUS: ' . $model->getStatus();
	echo '</b><br /><br />';
	echo $model->getStatusImage();
	echo '<br />';
	echo '<br/>Source: <a href="http://www.halal.gov.my/" target="_blank"><i>Halal Malaysian Portal</i></a><br />';
}else{
	echo '<b>STATUS: UNKNOWN';
	echo '</b><br /><br />';
	echo Html::img(    Url::to('@web/images/logo-unknown.png', true), ['alt' => 'NOT ACTIVE / UNKNOWN', 'width' => 100]);
}


?>