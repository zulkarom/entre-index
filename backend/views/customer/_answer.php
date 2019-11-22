<?php 
use backend\models\QuestionLikert;
use backend\models\Question;
use backend\models\Result;
use frontend\models\Page;
use common\models\QFormat;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$questions = Question::find()->where(['cat_id' => $category->id]) -> all();
$model = Result::find()->where(['customer_id' => $page->customer_id])->one();
$id = $category->id;
$text = $category->cat_text_bi;
?>


<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-<?=$id ?>"><?= $text ?></button>


<div id="modal-<?=$id ?>" class="modal" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $text ?></h4>
      </div>
      <div class="modal-body">
<div class="row">
				<div class="col-md-9">
					<?=QFormat::qcat($category->para_quest, $category->para_quest_bi)?>
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
			echo '<td>'.$q->question_text_bi .'</td>';
			
				for($x=1;$x<=$opt;$x++){
					$fd = 'q_' . $q->id;
					
					if($category->question_type == 1){
						if($model->{$fd} == $x){
							//$active = ' activecell';
							$active = '';
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
						if($q->ext_type == 3){ //checkbox
							$options = $q->questionOptions;
							$b = 1;
							foreach($options as $cb){
								$p = 'q_'.$q->id . '_' . $b ;
								if($model->$p == 1){
									echo $cb->option_text_bi . '<br />';
								}
									
									
								if($cb->has_text == 1){
									$p = 'q_'.$q->id . '_' . $b . '_other';
									echo '(' . $model->$p . ')' ;
								
								}
							$b++;
							}
						}else if($q->ext_type == 2){
							//textarea
							$sub = $q->questionSub;
							echo '<i>' . $sub->sub_text_bi . '</i>:<br />';
							$p = 'q_'.$q->id . '_text';
							echo $model->$p;
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

    </div>
	<?php ActiveForm::end(); ?>


      </div>
	  
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>