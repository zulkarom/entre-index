<?php 

use yii\helpers\Url;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');

$this->title= 'MEMBER PAGE';
?>


	<div class="block-content">
	 <section class="content">

</section>
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="section_title text-center">WELCOME TO ELI</h2>
				</div>
				
				
				
				
			</div>
			<br />
			<?php 
	/*  <div class="row" style="text-align:justify">
			
			<div class="col-lg-6"><p>Several indices have been established to measure innovativeness level of firms in an industry or a nation. In Malaysia at least three indices INNOCERT (SME Corp), NCII (AIM) and Competitive Index (NPC) were established, however less emphasis is given to the human expect in innovation. For this, SMEII is established to give a more holistic innovation measure which covers both the technical as well as human aspect. This is more important for micro and small enterprise as the human aspect plays a more dominant role. SMEII measures the capability and competencies of an enterprise based on the elements of organizational, financing, owner, product or process, performance and creative output. It can be used at both the macro and micro level of entrepreneurship. At the macro level, the index can indicate the innovativeness of entrepreneurs in a country or industry, while at the micro level it can measure the innovativeness of the individual entrepreneur. It indicates the strength and weaknesses of each or group of entrepreneurs for each of the elements by comparing it with the benchmark established using the 15 most innovative entrepreneurs suggested by SME Corp, on those said elements.</p></div>
				
				<div class="col-lg-6"><p>The index system was developed into a web-based application which can be accessed by the particular organization or entrepreneur. Using a cobweb analysis of the survey input provided by the entrepreneur, the index can indicate the strengths and weaknesses of the entrepreneur relative to the benchmark set earlier. Consequently, the appropriate intervention will be proposed by the SMEII to the entrepreneurs based on the predetermined elements. This can enabled the organizations and entrepreneurs to know more specifically which area based on those elements, to be given more emphasis towards improving the capability and competency of the entrepreneur’s innovativeness. With more specificity, resources used to help improve the entrepreneurs can be used more efficiently compared to the one size fit all solution. This can be done because the SMEII enables the organizations and entrepreneur to know before hand on which area they are weak and need intervention and which area they are strong and need to be sustain to be more innovative.</p>
					
				</div>
			
			</div>*/
			?>
			<br />
			
			<?php 
				if($page->curr_page ==1){
					?>
					<div class="home_button"><a href="<?=Url::to(['question/index'])?>">START ANSWER</a> </div>
					<?php
				}else if($page->curr_page < 16){
					?>
					<div align="center" style="text-align:center">YOU HAVE NOT FINISHED ANSWERING THE QUESTIONS<br /><br /><a class="btn btn-warning" href="<?=Url::to(['question/index'])?>">CONTINUE ANSWERING</a></div><br />
					
					<div style="width:160px;margin:0 auto">
	<h4 style="text-align:center">Progress</h4>
                        <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 150px; height: 80px;"></canvas>
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
					<?php
				}else{
					?>
					<div align="center" style="text-align:center">YOU HAVE FINISHED ANSWERING<br /><br /><a class="btn btn-success" href="<?=Url::to(['result/index'])?>">VIEW RESULT</a></div>
					<?php
					
				}
				
				?>

	
			
			
		</div>
	</div>
	
<br /><br /><br />