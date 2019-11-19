<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Search Product (JAKIM DIRECTORY)';
$this->params['breadcrumbs'][] = ['label' => 'Halal Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model common\models\ProductJakimForm */
/* @var $form ActiveForm */

if($page){
	$list = $page[0];
	$counter = $page[2];
}else{
	$list = array();
	$counter = null;
}


?>
<div class="box">
<div class="box-header">
<div class="box-title">Search Form</div>
</div>
<div class="box-body"><div class="product-search_form">



    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-md-6">

<?= $form->field($model, 'cari') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
		
</div>



</div>
        
    <?php ActiveForm::end(); ?>

</div>








</div>
</div><!-- product-search_form -->

<?php 
if($cat){
?>
<div class="box">
<div class="box-header"><div class="box-title">Category Result</div></div>
<div class="box-body">

<div class="product-search_result">

<table class="table table-striped table-hover">
<thead>
<tr>
	<th>#</th>
	<th>Category</th>
	<th>Result Count</th>
	<th>View Details</th>
</tr>
</thead>
<tbody>

	<?php 
	
	
		$i = 1;
		foreach($cat as $c){
			echo '<tr>';
				echo '<td>'.$i.'</td>';
				
				echo '<td>' . $c['category'] . '</td>';
				
				echo '<td>'.$c['count'].'</td>';
				echo '<td><a class="btn btn-warning" href="'.Url::to(['product/search-jakim/', 'cari' => $model->cari , 'ty' => $c['link'], 'page' => 1, 'hdnCounter' => $counter]) .'">VIEW</a></td>';
			echo '</tr>';
		$i++;
		}
	
	
	?>
	
	
</tbody>
</table>

    

</div>



</div>
</div>



<div class="box">
<div class="box-header">
<div class="box-title">Category Details <?php echo $model->cat_title ? '(' .$model->cat_title . ')' : ''?></div>
</div>
<div class="box-body">

<table class="table table-striped table-hover">
<thead>
<tr>
	<th>#</th>
	<th>Name</th>
	<th>Company</th>
	<th>Expired Date</th>
	<th>ETS Code</th>
</tr>
</thead>
<tbody>
<?php 
if($details){
    $i = 1;
    foreach($details as $d){
		$date = date('d M Y', strtotime($d['exdate'] ));
		$url = Url::to(['product/add-product-jakim/', 'product_name' => $d['name'] , 'company' => $d['address'], 'company_id' => $d['company_id'], 'expired_date' => $d['exdate'], 'ty' => $d['ty']]);
        echo '
        <tr>
            <td>'. $d['bil'] .'</td>
            <td>'. $d['name'] .'</td>
            <td>'. $d['address'] .'</td>
            <td>'. $date .'</td>
			<td><a class="btn btn-primary" href="'.$url.'">Get Code</a></td>
        </tr>
        
';
        $i++;
    }
}
?>
</tbody>
</table>

<?php 
if($page){
?>
<div align="center">
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
<ul class="pagination">


<?php 

if($list){
	foreach($list as $row){
		$pg = $row['page'];
		$href = '';
		$active = '';
		if($row['curr'] == 1){
			$active = ' active';
		}else{
			$href = Url::to(['product/search-jakim/', 'cari' => $model->cari , 'ty' => $row['ty'], 'page' => $pg, 'hdnCounter' =>$counter ]);
		}
		
		
		echo '<li class="paginate_button'.$active.'"><a href="'.$href.'" aria-controls="example2" data-dt-idx="'.$pg.'" tabindex="0">'.$pg.'</a></li>';
	}
}
?>




</ul>

</div>

<b><?php echo $page[1] ;?></b>

</div>

<?php } ?>
</div>
</div>


<?php 
}else{
	if($hasil and $conn == 1){
		echo '<div align="center"><b>Sorry, no result found! Try to use another keywords.</b></div>';
	}
	if($conn == 0){
		echo '<div align="center"><b>Sorry, there is problem getting information from JAKIM public directory.</b></div>';
	}
	
}
?>

<?php 
//echo '<pre>';print_r($page);echo '</pre>';
?>
