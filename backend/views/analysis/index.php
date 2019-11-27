<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Overall Analysis';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="result-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




<?php 

foreach($primes as $prime){
	echo '<div class="box box-primary">
<div class="box-header">
<div class="box-title">'.$prime->prime_name_bi .'</div>
</div>
<div class="box-body">


';

foreach($prime->questionMains as $main){
	echo '<table class="table table-striped">
<thead>
<tr><th width="30%"></th>';
$td = '';
foreach($main->questionCat as $cat){
	echo '<th width="150px">'.$cat->cat_text_bi .'</th>';
	$td .= '<td>'.$cat->average .'</td>';
}
$td .= '<td><a href="'.Url::to(['analysis/university', 'main' => $main->id]).'" class="btn btn-primary btn-sm">By University</a></td>';
	
echo '
<th></th>
</tr>
</thead>
	<tr>
	<td>'. $main->main_name_bi .'</td>';
	
	echo $td;
	
	echo '</tr>
	</table>
	<br /><br />
	';
}

echo '

</div>
</div>
';
}

?>




</div>
