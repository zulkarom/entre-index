<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\QuestionLikert;
use common\models\QFormat;

/* @var $this yii\web\View */


$this->title = 'Question Page ';


$this->registerJs('

jQuery(\'.opttd\').click(function() {
	var cl = $(this).attr("class");
	//alert(cl);
	var arr = cl.split(" ");
	var name = arr[1];

    jQuery("."+name).removeClass(\'activecell\');
    jQuery(this).addClass(\'activecell\');
    jQuery(this).find("input").prop("checked", true);
});

');

?>
<style>
.form-group{
	margin-bottom:0px;
}

</style>

<div class="block-content">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?=QFormat::qcat($category->para_quest, $category->para_quest_bi)?>
				</div>
				
				<div class="col-md-3">
				
				<div class="pull-right">
	<div style="text-align:center">Progress</div>
                        <canvas width="80" height="40" id="chart_gauge_01" class="" style="width: 80px; height: 40px;"></canvas>
                        <div class="goal-wrapper">
                          <span id="gauge-text" class="gauge-value pull-left">0</span>
                          <span class="gauge-value pull-left">%</span>
                          <span id="goal-text" class="goal-value pull-right">100%</span>
                        </div>
						
<?php 
$per = $page->curr_page / 17 * 100;
$this->registerJs("
var chart_gauge_settings = {
		  lines: 12,
		  angle: 0,
		  lineWidth: 0.4,
		  pointer: {
			  length: 0.75,
			  strokeWidth: 0.042,
			  color: '#1D212A'
		  },
		  limitMax: 'false',
		  colorStart: '#1ABC9C',
		  colorStop: '#1ABC9C',
		  strokeColor: '#F0F3F3',
		  generateGradient: true
	  };
	  

			
var chart_gauge_01_elem = document.getElementById('chart_gauge_01');
var chart_gauge_01 = new Gauge(chart_gauge_01_elem).setOptions(chart_gauge_settings);



chart_gauge_01.maxValue = 100;
chart_gauge_01.animationSpeed = 20;
chart_gauge_01.set(". $per .");
chart_gauge_01.setTextField(document.getElementById(\"gauge-text\"));


");
						
?>
</div>
				</div>
				
				
				
				
			</div>
			
			
			<?php $form = ActiveForm::begin(); ?>



	
	
	
	<div class="table-responsive"><table class="table table-striped table-hover" style="font-size:16px;">
<thead>
<tr>
<th colspan="2">
<h4><?=QFormat::qheader($category->cat_text, $category->cat_text_bi)?></i></h4>
</th>

<?php
$th = '';
$optd = '';
if($category->question_type == 1){
	$optd = 'optd';
	$width = 35;
	$opt = 4;
	for($x=1;$x<=4;$x++){
		$th .= '<th>'.$x.'</th>';
	}
}else if($category->question_type == 2){
	$width = 30;
	$opt = 2;
	$th .= '<th>YES</th><th>NO</th>';
}
?>

<th colspan="5" width="<?=$width?>%">
<?php 
if($category->question_type == 1){
	echo '<div class="row">';
	
	$i = 1;
	foreach(QuestionLikert::find()->where(['likert_cat' => $category->likert_cat])->all() as $lk){
		
		echo ($i == 1 or $i == 3) ? '<div class="col-md-6">' : '';
		
		echo QFormat::qlikert($lk->likert_value, $lk->likert_text, $lk->likert_text_bi);
		
		echo ($i == 2 or $i == 4) ? '</div>' : '<br />';
		
	$i++;
	
	}
	echo '</div>';
?>
	
<?php } ?>
</th>

</tr>
<thead>
<tr>
<th>No.</th>
<th>Questions</th><?=$th?></tr>


</thead>
<tbody>
	<?php 
	
		$i = (($page->curr_page - 1) * 5) + 1;
		foreach($questions as $q){
			echo '<tr>';
			echo '<td>'.$q->id .'. </td>';
			echo '<td>'.QFormat::qtext($q->question_text, $q->question_text_bi) .'</td>';
			
				for($x=1;$x<=$opt;$x++){
					$fd = 'q_' . $q->id;
					
					if($category->question_type == 1){
						if($model->{$fd} == $x){
							$active = ' activecell';
						}else{
							$active = '';
						}
					}else{
						if($x == 1){
							$yesno = 1;
						}else{
							$yesno = 0;
						}
						
						if($model->{$fd} == $yesno){
							$active = '';
						}else{
							$active = '';
						}
					}
					
					
					
					echo '<td class="'.$optd.' row-'.$i.' val-'.$x. $active.'">';
					
					
					if($category->question_type == 1){
						 echo $x;
						$val = $x;
					}else{
						if($x == 1){
							echo 'YES';
							$val = 1;
						}else{
							echo 'NO';
							$val = 0;
						}
					}
					
					
					echo $form->field($model, $fd)->radio(['label'=> '', 'value' => $val, 'required' => true, 'uncheck' => null])->label(false);
					
					if($x == 1){
						if($q->ext_type == 3){
							echo '<i>(you can tick more than one)</i><br /><br />';
							$options = $q->questionOptions;
							$b = 1;
							foreach($options as $cb){
								/* echo '<div>';
								echo $cb->option_text_bi;
								echo '</div>'; */
								
								echo $form->field($model, 'q_' . $q->id . '_' . $b)->checkbox(array('label'=> $cb->option_text_bi))
								;
							$b++;
							}
						}else if($q->ext_type == 2){
							$sub = $q->questionSub;
							echo $form->field($model, 'q_'.$q->id . '_text')->textarea(['rows' => 3])->label($sub->sub_text_bi);
						}
						
					}
					
					echo '</td>';
				}
			echo '</tr>';
		$i++;
		}
		
		
		?>
	
</tbody>
</table></div>
<div class="form-group" align="center">
<br />
<?php 

if($page->curr_page == 34){
	echo Html::submitButton('<span class="fa fa-save"></span> FINISH', ['class' => 'btn btn-danger']);
}else{
	echo Html::submitButton('<span class="fa fa-save"></span> SAVE AND NEXT', ['class' => 'btn btn-primary']);
}
?>
<br /><br />
    </div>
	<?php ActiveForm::end(); ?>


	
			
			
		</div>
	</div>


<?php 



?>
