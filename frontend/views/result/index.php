<?php

use backend\models\QuestionMain;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Result Page';
$prime = $result->getPrimeResult();
?>
<div class="block-content">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8">
					<h2 class="section_title text-center">RESULT PAGE</h2>
					
				</div>
				
				<div class="col-md-4 pull-right">
				<a href="<?=Url::to(['result/pdf'])?>" class="btn btn-outline-danger" target="_blank"><span class="fa fa-download"></span> DOWNLOAD PDF</a>
				</div>
				
			</div>
			
			<br />
			<div class="row">
				<div class="col">
					<h3 class="section_title text-center">BUSINESS INFORMATION</h3>
				</div>
			</div>
			<br />
			<div class="row">
			<div class="col-md-6">
			<table class="table table-striped table-hover">
<tbody>
	<tr>
		<td><b>INSTITUTION NAME</b></td>
		<td><?=$result->p_6_3?></td>
	</tr>
	<tr>
		<td><b>INSTITUTION TYPE</b></td>
		<td><?=$result->getQuestionSubOptions(6,4)->option_text_bi?></td>
	</tr>
	<tr>
		<td><b>POSITION IN THE INSTITUTION</b></td>
		<td><?php 
		$qid = 7;
		$attr = 'p_' . $qid;
		$val = $result->{$attr};
		if(in_array($val, [6,7])){
			$text_attr = $attr . '_' . $val . '_text';
			$val_text = $result->{$text_attr};
			$text = $result->getQuestionOption($qid)->option_text_bi;
			$text = str_replace('State the position',$val_text,$text);
			echo $text;
		}else if($result->{$attr} == 7){
			
		}else{
			echo $result->getQuestionOption($qid)->option_text_bi;
		}
		
		
		?></td>
	</tr>
	<tr>
		<td><b>I AM A</b></td>
		<td><?=$result->getQuestionOption(1)->option_text_bi?></td>
	</tr>
</tbody>
</table>
			</div>
			<div class="col-md-6">
			
			<table class="table table-striped table-hover">
<tbody>
	<tr>
		<td><b>INSTITUTION’S APPROXIMATE NUMBER OF STUDENTS</b></td>
		<td><?=$result->getQuestionOption(2)->option_text?></td>
	</tr>
	<tr>
		<td><b>I  HAVE INDUSTRY/S EXPERIENCE BEFORE JOINING ACADEMICS</b></td>
		<td><?=$result->getQuestionOption(3)->option_text?></td>
	</tr>
	<tr>
		<td><b>WHICH SECTOR WERE YOU INVOLVED WITH</b></td>
		<td><ul style="margin-left:0px;"><?php 
		
		foreach($result->getTickedCheckbox(4) as $r){
			echo '<li>'.$r.'</li>';
		}
		
		?>
		</ul>
		</td>
	</tr>
	<tr>
		<td><b>WHAT IS THE COMPANY’S MAIN ACTIVITY </b></td>
		<td>
		<ul style="margin-left:0px;">
		<?php 
		
		foreach($result->getTickedCheckbox(5) as $key=>$r){
			if($key == 19){
				echo '<li>Others('.$result->p_5_19_text .')</li>';
			}else{
				echo '<li>'.$r.'</li>';
			}
			
		}
		
		
		?>
		</ul>
		
		</td>
	</tr>
</tbody>
</table>
			
			</div>
			</div>
		
			<div class="row">
				<div class="col">
					<h3 class="section_title text-center">OVERALL RESULT</h3>
				</div>
				
				
				
				
			</div>
			
			<br />
			<div class="row">
<div class="col-md-6">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>#</th>
<th>OVERALL RESULT</th>
<th>SCORE</th>
<th>BENCHMARK</th>
</tr>
</thead>
<tbody>
<?php 
$num = 1;
foreach($prime as $pr){
	echo '<tr>
		<td>'.$num.'. </td>
		<td><b>'. $pr->prime_name_bi .'</b></td>
		<td>'. number_format($pr->result ,4) .'</td>
		<td>'. $pr->benchmark .'</td>
	</tr>';
$num++;
}

?>
	
</tbody>
</table>

</div>


<div class="col-md-5"><img src="<?=Url::to(['chart/overall-chart'])?>" /></div>
</div>


<div class="row">
<div class="col-md-6">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>MAIN DIMENSION</th>
<th>DIMENSION</th>
<th>SCORE</th>
<th>BENCHMARK</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($result->getPrimeResult() as $main){
	echo '<tr>';
		echo '<td rowspan="2">' . $i . '. </td>';
		
		echo '<td rowspan="2"><b>' . $main->prime_name .  '</b> <br /> <i>'. $main->prime_name_bi .'</i></td>';
		
		echo '<td><b>' . $main->main_result[0]->main_name .  '</b> <br /> <i>'. $main->main_result[0]->main_name_bi .'</i></td>';
		
		
		echo '<td>';
			echo $main->main_result[0]->result;
		echo '</td>';
		echo '<td>';
			echo $main->main_result[0]->benchmark;
		echo '</td>';
	echo '</tr>';
	
	echo '<tr>';

		echo '<td><b>' . $main->main_result[1]->main_name .  '</b> <br /> <i>'. $main->main_result[1]->main_name_bi .'</i></td>';
		
		
		echo '<td>';
			echo $main->main_result[1]->result;
		echo '</td>';
		echo '<td>';
			echo $main->main_result[1]->benchmark;
		echo '</td>';
	echo '</tr>';
	
	$i++;
}

?>
</tbody>
</table>

</div>

<div class="col-md-6">
<img src="<?=Url::to(['chart/main-chart'])?>" />
</div>

</div>


<?php 
foreach($prime as $pr){
	?>
	<div class="row">
		<div class="col">
			<h3 class="section_title text-center"><?='<i>'. $pr->prime_name_bi?></i></h3>
		</div>
		<br /><br /><br />
	</div>
	
	
	<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<img src="<?=Url::to(['chart/cat-chart', 'prime' => $pr->id ])?>" />
</div>
</div>


	<div class="row">
<div class="col-md-12">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>DIMENSION</th>
<th>SUB DIMENSION</th>
<th>SCORE</th>
<th>BENCHMARK</th>
<th>DESCRIPTION</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;

foreach($result->getMainResult($pr->id) as $cat){
	
	echo '<tr>';
		$rowspan = count($cat->cat);
		echo '<td rowspan="'.$rowspan.'">' . $i . '. </td>';
		
		echo '<td rowspan="'.$rowspan.'"><b>' . $cat->main_name .  '</b> <br /> <i>'. $cat->main_name_bi .'</i></td>';
		
		echo '<td><b>' . $cat->cat[0]->cat_text .  '</b> <br /> <i>'. $cat->cat[0]->cat_text_bi .'</i></td>';
		
		$desc = $cat->cat[0]->description;
		echo '<td>';
			echo '<span class="btn btn-outline-'.$desc[1].' btn-sm">' . $cat->cat[0]->result . '</span>';
		echo '</td>';
		echo '<td>';
			echo $cat->cat[0]->benchmark;
		echo '</td>';
		echo '<td>';
		
			echo $desc[0];
		echo '</td>';
	echo '</tr>';
	
	
	array_shift($cat->cat);
	foreach($cat->cat as $item){
		echo '<tr>';

		echo '<td><b>' . $item->cat_text .  '</b> <br /> <i>'. $item->cat_text_bi .'</i></td>';
		
		$desc = $item->description;
		
		echo '<td>';
			echo '<span class="btn btn-outline-'.$desc[1].' btn-sm">' .$item->result . '</span>';
		echo '</td>';
		echo '<td>';
			echo $item->benchmark;
		echo '</td>';
		echo '<td>';
			echo $desc[0];
		echo '</td>';
	echo '</tr>';
	}
	
	
	
	$i++;
}

?>
</tbody>
</table>

</div>



</div>



			
	<?php
}

?>



			


	
			
		</div>
	</div>


<br />
<br />
<br />
