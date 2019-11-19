<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\QFormat;

/* @var $this yii\web\View */


$this->title = 'PERSONAL AND INSTITUTION’S PROFILE';


?>


<div class="block-content">
		<div class="container">
			<div class="row">
				<div class="col">
					<h3 class="text-center"><?=$this->title?></h3>
				</div>
				
				
				
				
			</div>
			
			<br />
			
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			
			<?php $form = ActiveForm::begin(); 
			
			echo $form->errorSummary($model);
			
			$i = 1;
			foreach($question as $q){
				?>
				<div class="form-group">
				<table border="0" width="100%">
				<tbody>
					<tr valign="top">
					<td width="3%"><span class="txt-no">D<?=$i?>. </span></td>
					<td style="padding-left:10px;">
						<label><?=QFormat::qtext($q->question_text, $q->question_text_bi)?>
						</label>
						
						<br />
						<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-11">
							<?php 
							if($q->question_type == 1){
								if($q->questionSubs){
									foreach($q->questionSubs as $sub){
										?>
										
										<?php 
										if($sub->sub_type != 3){
											?>
											<label>
										<?=QFormat::qoption($sub->sub_text, $sub->sub_text_bi)?>
										
										</label>
											
											<?php
										}
										
										?>
										
										<div class="row">
										<div class="col-md-10">
										<?php 
										if($sub->sub_type == 1){
											echo $form->field($model, 'p_'. $q->id . '_' . $sub->id)->textInput(['required'=> true])->label(false);
										}else if($sub->sub_type == 2){
											$sub_options = ArrayHelper::map($sub->subOptions, 'option_value', 'optionText');
											echo $form->field($model, 'p_'. $q->id . '_' . $sub->id)->dropDownList($sub_options, ['required'=> true])->label(false);

										}else if($sub->sub_type == 3){
											
											
											echo $form->field($model, 'p_'. $q->id . '_' . $sub->id, ['template' => '{label}{input}']) ->checkbox(array('label'=> QFormat::qoption($sub->sub_text, $sub->sub_text_bi))); 
											
											if($sub->has_text == 1){
												echo $form->field($model, 'p_'. $q->id . '_'.$sub->id .'_text')->textInput(['placeholder' => "Please Specify..."])->label(false);
											}

										}
										
										?>
										</div>
										</div>
										
										
										<?php
									}
								}
							//radio button
							}else if($q->question_type == 2){
								if($q->questionOptions){
									foreach($q->questionOptions as $sub){
										?>
										<div class="form-group">
										
										<?php 
										$label = QFormat::qoption($sub->option_text, $sub->option_text_bi);
										?>
										
										<?= $form->field($model, 'p_'. $q->id)->radio(['label'=> $label,'value' => $sub->option_value, 'uncheck' => null, 'required' => true, 'class' => 'option_'. $q->id]) ?>
										
										<?php 
										if($sub->option_value == 999){
											echo $form->field($model, 'p_'. $q->id . '_other')->textInput(['placeholder' => "Please Specify..."])->label(false);
										}
										if($sub->has_text == 1){
											echo $form->field($model, 'p_'. $q->id . '_'.$sub->option_value .'_text')->textInput(['style' => 'display:none','placeholder' => "Please Specify..."])->label(false);
										}
										
										
										?>
										
										
										
										</div>
										<?php
									}
								}
							}
							
							?>
						
						</div>
						</div>
						<?php 
						if($q->question_note){
							echo '<i>'.$q->question_note.'</i>';
						}
						
						?>
						
					</td>
					</tr>
				</tbody>
				</table>
				
				
				
				</div>
				<?php
			$i++;
			}
			
			$this->registerJs('
			jQuery("#result-p_5_other").click(function(){

				jQuery("input[id=\"result-p_5\"][value=\"999\"]").prop("checked", true);
			});
			
			
			jQuery(".option_7").click(function() {
				jQuery("#result-p_7_6_text").hide();
				jQuery("#result-p_7_7_text").hide();
			});
			
			jQuery("input[id=\"result-p_7\"][value=\"6\"]").click(function(){
				jQuery("#result-p_7_6_text").show();
			});
			
			jQuery("input[id=\"result-p_7\"][value=\"7\"]").click(function(){
				jQuery("#result-p_7_7_text").show();
			});
			
			
			function show_text(){
				jQuery("input[id=\"result-p_7\"][value=\"6\"]").click(function(){
				jQuery("#result-p_7_6_text").show();
			});
			
			jQuery("input[id=\"result-p_7\"][value=\"7\"]").click(function(){
				jQuery("#result-p_7_7_text").show();
			});
			
			}
			
			');
			
			?>
			
			<div align="center"><?=Html::submitButton('SAVE AND NEXT', ['class' => 'btn btn-primary'])?></div>
			
			
			<?php ActiveForm::end(); ?>
			
			</div>

			</div>
			
			
			<br />
	
		

	
			
			
		</div>
	</div>


