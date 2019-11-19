<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Question;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'QUESTION SET';
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

<div class="box">
<div class="box-header"></div>
<div class="box-body">
<?php $form = ActiveForm::begin(); ?>

<div class="row">
<div class="col-md-3">
<?php

$qpage = array();
for($p=1;$p<=35;$p++){
	if($p == 35){
		$qpage[$p] = 'FINISHED';
	}else{
		$qpage[$p] = 'PAGE ' . $p;
	}
	
}

echo $form->field($model->page, 'curr_page')
->dropDownList($qpage)->label('Current Progress');
 ?>
</div>
</div>

        
    
        <div class="form-group">
            <?= Html::submitButton('Change Progress', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>


<?php
$num = 1;
for($i=1;$i<=34;$i++){
	?>
	
	<div class="box">
<div class="box-header">
<div class="box-title">PAGE <?=$i?></div>
</div>
<div class="box-body">
<table class="table table-striped table-hover">
<thead>
<tr>
	<th width="5%">#</th>
	<th>QID</th>
	<th>DIMENSION</th>
	<th>SUB DIMENSION</th>
	<th>QUESTION TEXT</th>
	<th>RESPONSE</th>
</tr>
</thead>
<tbody>
<?php 
$col = 'p_'.$i;
$json = $model->page->$col;
$arr = json_decode($json);
if($arr){
	foreach($arr as $q){
		$quest = Question::getQuestionData($q);
		$response = $quest->getQuestionAnswer($model->id);
		$text = $quest->question_text;
		$cat = $quest->questionCat;
		$pre = $cat->pre_quest;
		$sub = $cat->cat_text;
		$main = $cat->questionMain;
		$main_text = $main->main_name;
		echo '<tr>
		<td>'.$num.'. </td>
		<td>'.$q.'. </td>
		<td>'.$main_text.'. </td>
		<td>'.$sub.'. </td>
		
		<td>'. $pre . ' ' . $text  .'</td>
		<td>'.$response.'</td>
	</tr>';
	$num++;
	}
}


?>
	
</tbody>
</table>

</div>
</div>
	
	<?php
}

?>
