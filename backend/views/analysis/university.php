<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicators by University';
$this->params['breadcrumbs'][] = $this->title;

$cat = $qmain->questionCat;
?>
<div class="result-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="form-group"><a href="<?=Url::to(['analysis/index'])?>" class="btn btn-warning">Back</a></div>
<div class="box">
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
        <th>Universities</th>
		<th>Count</th>
		<?php 
		$td = '';
		foreach($qmain->questionCat as $cat){
			echo '<th>'.$cat->cat_text_bi .'</th>';
			$td .= '<td></td>';
		}
		
		?>
      </tr>
    </thead>
    <tbody>
	  <?php 

foreach($qmain->resultByUniversity as $m){
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
