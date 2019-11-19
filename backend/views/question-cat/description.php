<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Description';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-cat-index">

<table class="table table-striped table-hovered">
<thead>
<th>No.</th><th>Sub Dimension</th><th>High</th><th>Medium</th><th>Low</th><th></th>
</thead>
<?php
$i = 1;
foreach($query as $cat){
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$cat->cat_text .'/<i>'.$cat->cat_text_bi .'</i></td>
	<td>'.$cat->desc_high .'</td>
	<td>'.$cat->desc_medium .'</td>
	<td>'.$cat->desc_high .'</td>
	<td>'. Html::a('Update', ['/question-cat/update-desc', 'id' => $cat->id], ['class' => 'btn btn-warning btn-sm']) .'</td>
	
	</tr>';
$i++;
}

?>
 </table>
</div></div>
</div>
