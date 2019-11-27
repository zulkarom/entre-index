<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicators by University';
$this->params['breadcrumbs'][] = $this->title;

$cat = $qmain->questionCat;
echo '<h3>'.$qmain->main_name_bi.'</h3>';
$sort_kira = '';
if($sort == 'kira'){
	$sort_kira = ' <i class="fa  fa-sort-numeric-desc"></i>';
}

?>
<div class="result-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="form-group"><a href="<?=Url::to(['analysis/index'])?>" class="btn btn-warning">Back</a></div>
<div class="box box-danger">
<div class="box-header">
	<div class="box-title">
	<?=$qmain->main_name_bi?>
	</div>
</div>
<div class="box-body">


<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th><a href="<?=Url::to(['analysis/university', 'main' => $qmain->id])?>">Universities</a></th>
		<th><a href="<?=Url::to(['analysis/university', 'main' => $qmain->id, 's' => 'kira'])?>">Count<?=$sort_kira?></a></th>
		<?php 
		$td = '';
		foreach($qmain->questionCat as $cat){
			echo '<th>
			<a href="'.Url::to(['analysis/university', 'main' => $qmain->id , 's' => $cat->id]).'">'.$cat->cat_text_bi ;
			if($cat->id == $sort){
				echo ' <i class="fa  fa-sort-numeric-desc"></i>';
			}
			
			echo '</a></th>';
			$td .= '<td></td>';
		}
		
		?>
      </tr>
    </thead>
    <tbody>
	  <?php 

foreach($qmain->getResultByUniversity($sort) as $m){
	echo '<tr>
        <td>'.$m['p_6_3'];
		
		
		
	echo '</td> ';
	
	echo '<td>'.$m['kira'].'</td>';
	
	foreach($qmain->questionCat as $cat){
			echo '<td>'.$m[$cat->sql_col] .'</td>';
		}
	
	echo '
      </tr>';
}

?>
      
    </tbody>
	
  </table>
</div>




</div>
</div>
