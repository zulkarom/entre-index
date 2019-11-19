<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'RESULT';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="customer-view">

    <p>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-warning']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'user.email',
			'user.created_at:datetime',
			//'page.curr_page'
			
        ],
    ]) ?>

</div></div>
</div>

<?php 

$result->setMainResult();
?>
<h3>OVERALL RESULT FOR EIGHT DIMENSIONS</h3>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="row">
<div class="col-md-6">
<table class="table table-striped table-hover">

<tbody>
<?php 
for($i=0;$i<8;$i++){
	$num  = $i + 1;
	echo '<tr>
		<td>'.$num.'. </td>
		<td>'. $result->arr_main_name[$i] .'</td>
		<td>'. number_format($result->arr_main_value[$i],4) .'</td>
	</tr>';
}

?>
	
</tbody>
</table>

</div>
<div class="col-md-6"><?php 

echo ChartJs::widget([
    'type' => 'radar',
    'id' => 'main_dimension',
    'options' => [
        'height' => 300,
        'width' => 300
    ],
    'data' => [
        
        'labels' => $result->arr_main_name, // Your labels
        'datasets' => [
            [
                'data' => $result->arr_main_value, // Your dataset
                'label' => '',
				'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' =>  'rgba(200,0,0,0.6)',
				'fill' => true,
                'borderWidth' => 3,
				'radius' => 6,
				'pointStyle' => 'circle',
				'pointRadius' => 6,
				'pointBorderWidth' => 3,
				'pointBackgroundColor' => "orange",
				'pointBorderColor' => "rgba(200,0,0,0.6)",
				'pointHoverRadius' => 10,                
            ]
        ]
    ],
    'clientOptions' => [
		'scale' => [
			'ticks' => [
				'beginAtZero' => false,
				'min' => 1,
				'max' => 5,
				//'stepSize' => 0.5
				
			]
			
		],
		'legend' => false
		
        

    ],

        
])
?></div>



</div></div>
</div>


<?php 

foreach($quest as $main){
	echo '<h3>'.$main->main_name .'</h3>';
	?>
	
	<?php 
	$no = [6,7,8];
	if(!in_array($main->id, $no)){
	?>
	<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="row">

<div class="col-md-6">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>#</th>
<th colspan="2"><?=strtoupper($main->main_name)?> DIMENSION</th>
</tr>
</thead>
<tbody>
<?php 
$cat_label = array();
$cat_data = array();
$num = 1;
foreach($main->questionCat as $cat){
	$text = $cat->cat_text;
	$val = $result->getResultByCat($cat->id);
	
	echo '<tr>
		<td>'.$num.'. </td>
		<td>'. $text .'</td>
		<td>'.number_format($val, 4).'</td>
	</tr>';
	$cat_label[] = $text;
	$cat_data[] = $val;
$num++;
}

?>
	
</tbody>
</table>

</div>
<div class="col-md-4"><?php 

echo ChartJs::widget([
    'type' => 'radar',
    'id' => 'sub_dimension_' . $main->id,
    'options' => [
        'height' => 250,
        'width' => 250
    ],
    'data' => [
        
        'labels' => $cat_label, // Your labels
        'datasets' => [
            [
                'data' => $cat_data, // Your dataset
                'label' => '',
				'backgroundColor' => 'rgba(55, 55, 132, 0.2)',
                'borderColor' =>  'rgba(200,0,0,0.6)',
				'fill' => true,
                'borderWidth' => 3,
				'radius' => 6,
				'pointStyle' => 'circle',
				'pointRadius' => 6,
				'pointBorderWidth' => 3,
				'pointBackgroundColor' => "orange",
				'pointBorderColor' => "rgba(200,0,0,0.6)",
				'pointHoverRadius' => 10,                
            ]
        ]
    ],
    'clientOptions' => [
		'scale' => [
			'ticks' => [
				'beginAtZero' => false,
				'min' => 1,
				'max' => 5,
				'stepSize' => 1
				
			]
			
		],
		'legend' => false
		
        

    ],

        
])
?></div>
</div></div>
</div>
	<?php } ?>
	
	
	
	
	<div class="row">
	<?php
	foreach($main->questionCat as $cat){
	?>
	
<div class="col-md-6">
<div class="box">
<div class="box-header">
<div class="box-title">
<?=$cat->cat_text?>
</div>
</div>
<div class="box-body">

<div class="row">

<div class="col-md-12"><b><?=$cat->pre_quest?></b>
<table class="table table-striped table-hover">

<tbody>
<?php 
$qcount = 0;
$ans = 0 ;
foreach($cat->question as $q){
$qcount++;	
	$val = $q->getQuestionAnswer($model->id) + 0;
	echo '<tr>
		<td width="10"> - </td>
		<td width="700">' . $q->question_text .' <small><i>[QID:'.$q->id .']</i></small></td>
		<td>'. $val .'</td>
	</tr>';
$ans += $val;

}
$avg = number_format(round($ans/$qcount, 4), 4);

?>
	
</tbody>
<tfoot>
<tr>
<td></td>
<td align="right">
<b>AVERAGE</b>
</td>
<td>
<?=$avg?>
</td>
</tr>
</tfoot>
</table></div>

</div>



</div>
</div>
</div>

	
	
	
	<?php
	}
	
	?>
	</div>
	
	<?php
}


?>
