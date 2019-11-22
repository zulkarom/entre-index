<?php 

namespace common\models;

use Yii;
use CpChart\Chart\Radar;
use CpChart\Data;
use CpChart\Image;
use backend\models\Customer;
use backend\models\Result;

class PChart 
{
	private static function findResultIdentity()
    {
		$customer = Yii::$app->user->identity->customer->id;
        if (($model = Result::findOne(['customer_id' => $customer->id ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	private static function findResult($id)
    {
        if (($model = Result::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.xx');
        }
    }
	
	public static function overallChart($identifier = null){
		$result = self::findResultIdentity();
		$prime = $result->getPrimeResult();
		
		$innocap = $prime[2]->result ;
		$innocap_benc = $prime[2]->benchmark;
		
		$innocom = $prime[1]->result ;
		$innocom_benc = $prime[1]->benchmark ;
		
		$output = $prime[0]->result;
		$output_benc = $prime[0]->benchmark ;
		
		$data = array($innocap, $innocom, $output);
		$benchmark = array($innocap_benc, $innocom_benc, $output_benc);

		$title = "MAIN RESULT";
		
		$labels = array("ENTREPRENEURSHIP IMPACT","ENTREPRENEURIAL COMPETENCY","ENTREPRENEURIAL CAPABILITY");

		self::drawChart($title, $data, $benchmark, $labels, 'overall', $identifier);
		
	}
	
	public static function mainChart($identifier = null){
		$result = self::findResultIdentity();
		$prime = $result->getPrimeResult();
		
		$data = array();
		$benchmark = array();
		$labels = array();
		foreach($prime as $pr){
			foreach($pr->main_result as $main){
				$data[] = $main->result;
				$benchmark[] = $main->benchmark;
				$labels[] = $main->main_name_bi;
			}
		}

		$title = "RESULT BY DIMENSION";

		self::drawChart($title, $data, $benchmark, $labels, 'main', $identifier);
		
	}
	
	public static function catChart($id, $identifier = null){
		$result = self::findResultIdentity();
		$prime = $result->getPrimeResult();
		
		$data = array();
		$benchmark = array();
		$labels = array();
		$title = '';
		foreach($prime as $pr){
			if($pr->id == $id){
				
				$title = $pr->prime_name_bi;
				foreach($pr->main_result as $main){
					foreach($main->cat as $cat){
						$data[] = $cat->result;
						$benchmark[] = $cat->benchmark;
						$labels[] = $cat->cat_text_bi;
					}
					
				}
			}
			
		}
		
		//print_r(array($title, $data, $benchmark, $labels));

		self::drawChart($title, $data, $benchmark, $labels, $id .'-cat', $identifier);
		
	}
	
	private static function drawChart($title, $data, $benchmark, $labels, $filename, $identifier = null){
		/* Create and populate the pData object */ 
		 $MyData = new Data();    
		 $MyData->addPoints($data,"ScoreA");   
		 $MyData->addPoints($benchmark,"ScoreB");  
		 $MyData->setSerieDescription("ScoreA","INSTITUTION"); 
		 $MyData->setSerieDescription("ScoreB","BENCHMARK"); 

		 /* Define the absissa serie */ 
		 $MyData->addPoints($labels,"Labels"); 
		 $MyData->setAbscissa("Labels"); 

		 /* Create the pChart object */ 
		 $myPicture = new Image(550,370,$MyData); 

		 /* Draw a solid background */ 
		 $Settings = array("R"=>255, "G"=>255, "B"=>255, "Dash"=>0); 
		 $myPicture->drawFilledRectangle(0,0,700,430,$Settings); 



		 /* Add a border to the picture */ 
		 //$myPicture->drawRectangle(0,0,549,349,array("R"=>0,"G"=>0,"B"=>0)); 

		   /* Write the picture title */  
		 
		 $myPicture->drawText(150,25, $title ,array("FontSize"=>12, "R"=>80,"G"=>80,"B"=>80));
		$myPicture->setFontProperties(array("FontSize"=>10));
		 /* Set the default font properties */  
		 //$myPicture->setFontProperties(array("FontName"=> Config::get('PATH_PCHART') . "fonts/Forgotte.ttf","FontSize"=>15,"R"=>80,"G"=>80,"B"=>80)); 

		 /* Enable shadow computing */  
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

		 /* Create the pRadar object */  
		 $SplitChart = new Radar(); 



		 /* Draw a radar chart */  
		 $myPicture->setGraphArea(10,45,490,345); 
		 //"WriteValues"=>TRUE
		 $Options = array(
		 "ValueFontSize"=>8,
		 "Layout"=>RADAR_LAYOUT_CIRCLE,
		 "LabelPos"=>RADAR_LABELS_HORIZONTAL,
		 "BackgroundGradient"=>array(
			"StartR"=>255,
			"StartG"=>255,
			"StartB"=>255,
			"StartAlpha"=>100,
			"EndR"=>255,
			"EndG"=>255,
			"EndB"=>255,
			"EndAlpha"=>100), 
		//"FontName"=> Config::get('PATH_PCHART') . "fonts/pf_arma_five.ttf","FontSize"=>12
		)
		;
		 
		 $SplitChart->drawRadar($myPicture,$MyData,$Options); 

		 /* Write the chart legend */  
		 //$myPicture->setFontProperties(array("FontName"=>Config::get('PATH_PCHART') . "fonts/pf_arma_five.ttf","FontSize"=>10)); 
		 $myPicture->drawLegend(285,350,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_HORIZONTAL)); 

		 /* Render the picture (choose the best way) */ 
		 //$myPicture->autoOutput("pictures/example.radar.png"); 
		 //$myPicture->stroke;
		 if($identifier){
			 $myPicture->render("temp/chart-". $filename ."-".$identifier.".png");
		 }else{
			 $myPicture->autoOutput("pictures/example.radar.png"); 
		 }
		 
		 //$myPicture->stroke;
		 
	}
	
}
