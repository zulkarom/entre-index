<?php

namespace common\models;

use Yii;
use yii\helpers\Url;


class ResultPdf
{
	public $result;
	public $pdf;
	public $directoryAsset;
	public $image;
	public $prime;
	
	public function generatePdf(){
		$this->prime = $this->result->getPrimeResult();
		
		$this->directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');
		
		$this->pdf = new Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
	 	$this->headerFooter();
		$this->startPage();
		
		$methods = get_class_methods($this);
		//print_r($methods );
		foreach($methods as $method){
			if(substr($method, 0, 5 ) === "write"){
				call_user_func([$this, $method]);
			}
			
		}
		
	
	
		$this->pdf->Output('result.pdf', 'I');
	}
	
	public function headerFooter(){
		$this->pdf->font_footer_size = 11;
		$this->pdf->top_margin_first_page = 5;
		$this->pdf->margin_footer_bottom = 20;
		
		$this->pdf->header_html ='<div align="right"><i>Entrepreneurial Leadership Index</i></div>
		';

	}

	public function startPage(){
		// set document information
		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetAuthor('ELI');
		$this->pdf->SetTitle('ELI');
		$this->pdf->SetSubject('ELI');
		$this->pdf->SetKeywords('');



		// set header and footer fonts
		$this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$this->pdf->SetMargins(25, 10, PDF_MARGIN_RIGHT);
		//$this->pdf->SetMargins(0, 0, 0);
		$this->pdf->SetHeaderMargin(10);
		//$this->pdf->SetHeaderMargin(0);

		 //$this->pdf->SetHeaderMargin(0, 0, 0);
		$this->pdf->SetFooterMargin(20);

		// set auto page breaks
		$this->pdf->SetAutoPageBreak(TRUE, 20); //margin bottom

		// set image scale factor
		$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------



		// add a page
		$this->pdf->AddPage("P");
	}
	
	public function writeCover(){
		$this->pdf->SetFont('helvetica', '', 20);
		
		$html ='<div align="center">
<img src="images/umk.png" /><br />
		
		<b><i>
		ENTREPRENEURIAL LEADERSHIP INDEX
		<br />(ELI)
		</i></b>
		<br /><br />
		<span style="font-size:15px">SULIT/<i>CONFIDENTAL</i></span>
		<br /><br />
		<img src="images/cover.png" /><br />
		<p style="font-size:16px; text-align:left">
		<table border="1" cellpadding="5">
		<tr>
			<td width="30%"><b>Institution’s Name</b></td>
			<td width="70%">'.$this->result->p_6_3 .'</td>
		</tr>
		<tr>
			<td><b>Type of Institution</b></td>
			<td>'. $this->result->getQuestionSubOptions(6,4)->option_text_bi .'</td>
		</tr>
		<tr>
			<td><b>Your name:</b></td>
			<td>'.$this->result->customer->user->fullname .'</td>
		</tr>
		</table>
		</p>
		
		</div>';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
		$this->pdf->AddPage("P");
	}
	
	public function writeBizInfoTitle(){
		$this->pdf->SetFont('helvetica', '', 14);
		
		$html ='<br /><div><b>1. Business Information</b></div>
		<br />
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeBizInfoTable(){
		$this->pdf->SetFont('helvetica', '', 10);
		
		if($this->result->p_5 == 999){
			$activity = 'Others ('.$this->result->p_5_other .')';
		}else{
			if($this->result->getQuestionOption(5)){
				$activity =  $this->result->getQuestionOption(5)->option_text_bi;
			}else{
				$activity = '';
			}
		}
		
		$html ='<br />
		<table border="0" cellpadding="4">
		<tr>
		<td width="40%"><b>INSTITUTION NAME</b>: <br />'.$this->result->p_6_3 .'</td>
		<td width="60%"><b>INSTITUTION’S APPROXIMATE NUMBER OF STUDENTS</b>:<br /> '. $this->result->getQuestionOption(2)->option_text .' </td>
		</tr>
		
		<tr>
		<td><b>INSTITUTION TYPE</b>:<br /> '. $this->result->getQuestionSubOptions(6,4)->option_text_bi .'</td>
		
		<td>';
		
		$html .= '<b>I  HAVE INDUSTRY/S EXPERIENCE BEFORE JOINING ACADEMICS</b>:<br /> '. $this->result->getQuestionOption(3)->option_text;
		
		
		$html .= '</td>
		</tr>
		
		<tr>
		<td>';
		
		$html .= '<b>POSITION IN THE INSTITUTION</b>:<br /> ';
		$qid = 7;
		$attr = 'p_' . $qid;
		$val = $this->result->{$attr};
		if(in_array($val, [6,7])){
			$text_attr = $attr . '_' . $val . '_text';
			$val_text = $this->result->{$text_attr};
			$text = $this->result->getQuestionOption($qid)->option_text_bi;
			$text = str_replace('State the position',$val_text,$text);
			$html .= $text;
		}else if($this->result->{$attr} == 7){
			
		}else{
			$html .= $this->result->getQuestionOption($qid)->option_text_bi;
		}
		
		
		$html .= '</td>
		
		<td>
		
		<b>WHICH SECTOR WERE YOU INVOLVED WITH</b>:<br />
		<br />
		<table>';
	
		
		foreach($this->result->getTickedCheckbox(4) as $r){
			$html .= '<tr><td width="4%">-</td><td>'.$r.'</td></tr>';
		}
		
		$html .= '</table></td>
		</tr>
		
		<tr>
		<td>';
		
		$html .= '<b>I AM A</b>:<br /> ' . $this->result->getQuestionOption(1)->option_text_bi;
		
		
		$html .= '</td>
		
		<td>

<b>WHAT IS THE COMPANY’S MAIN ACTIVITY </b>:<br />
		
		<br />
		<table border="0">
		';
		
		foreach($this->result->getTickedCheckbox(5) as $key=>$r){
			if($key == 19){
				$html.= '<tr><td width="4%">-</td><td>Others('.$this->result->p_5_19_text .')</td></tr>';
			}else{
				$html .= '<tr><td width="4%">-</td><td>'.$r.'</td></tr>';
			}
			
		}

		$html .= '</table></td>
		</tr>
		
		</table>
		
		
		<br /><br />
	
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeResultTitle(){
		$this->pdf->SetFont('helvetica', '', 14);
		
		$html ='<br /><div><b>2. Result</b></div>
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeOverallTitle(){
		$this->pdf->SetFont('helvetica', '', 12);
		
		$html ='<br /><div><b>2.1 Main Result</b></div>
		<br />
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeOverallChart(){

		$html ='<div align="center"><img width="400" src="temp/chart-overall-'.$this->image .'.png" /></div><br />
		
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	

	
	public function writeOverallTable(){
		$this->pdf->SetFont('helvetica', '', 10);
		$html ='
		<table border="1" cellpadding="8" nobr="true">
		<tr style="font-weight:bold">
		<td width="5%">#</td>
		<td width="60%">OVERALL RESULT</td>
		<td width="15%">SCORE</td>
		<td width="20%">BENCHMARK</td>
		</tr>
		<tbody>';
		
		$num = 1;
		foreach($this->prime as $pr){
			$html .= '<tr>
				<td>'.$num.'. </td>
				<td>'. $pr->prime_name_bi .'</td>
				<td>'. number_format($pr->result ,4) .'</td>
				<td>'. $pr->benchmark .'</td>
			</tr>';
		$num++;
		}

$html .= '
		</table>
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
		
		
	}
	
	public function writeMainTitle(){
		$this->pdf->AddPage("P");
		$this->pdf->SetFont('helvetica', '', 12);
		
		$html ='<br /><div><b>2.2 Result By Dimension</b></div>
		<br />
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeMainChart(){

		$html ='<div align="center"><img width="400" src="temp/chart-main-'.$this->image .'.png" /></div><br />
		
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function writeMainTable(){
		$this->pdf->SetFont('helvetica', '', 10);
		$html ='
		<table border="1" cellpadding="8">
		<tr style="font-weight:bold">
		<td width="5%">#</td>
		<td width="30%">MAIN DIMENSION</td>
		<td width="30%">DIMENSION</td>
		<td width="15%">SCORE</td>
		<td width="20%">BENCHMARK</td>
		</tr>
		<tbody>';
		
		$i = 1;
foreach($this->prime as $main){
	$html .= '<tr>';
		$html .= '<td rowspan="2">' . $i . '. </td>';
		
		$html .= '<td rowspan="2">'. $main->prime_name_bi .'</td>';
		
		$html .= '<td>'. $main->main_result[0]->main_name_bi .'</td>';
		
		
		$html .= '<td>';
			$html .= $main->main_result[0]->result;
		$html .= '</td>';
		$html .= '<td>';
			$html .= $main->main_result[0]->benchmark;
		$html .= '</td>';
	$html .= '</tr>';
	
	$html .= '<tr>';

		$html .= '<td>'. $main->main_result[1]->main_name_bi .'</td>';
		
		
		$html .= '<td>';
			$html .= $main->main_result[1]->result;
		$html .= '</td>';
		$html .= '<td>';
			$html .= $main->main_result[1]->benchmark;
		$html .= '</td>';
	$html .= '</tr>';
	
	$i++;
}
$html .= '
		</table>
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
		
		
	}
	
	public function writeCatAll(){
		$p = 1;
		foreach($this->prime as $pr){
			
			$this->genCatTitle($pr);
			$this->genCatChart($pr->id);
			$this->genCatTable($pr->id, $p);
		$p++;
		}
	}
	
	public function genCatTitle($pr){
		$this->pdf->AddPage("P");
		$this->pdf->SetFont('helvetica', '', 12);
		$num = $pr->id + 2 ;
		$html ='<br /><div><b>'.$num . '. '. ucwords( strtolower($pr->prime_name_bi)).'</b></div>
		<br />
		';
		$html .=  '<span style="font-size:10pt">' . $pr->description . '</span>';
		
		$html .= '<br />';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function genCatChart($id){

		$html ='<div align="center"><img width="400" src="temp/chart-'.$id.'-cat-'.$this->image .'.png" /></div><br />
		
		';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	public function genCatTable($id, $p){
		$str_desc = '';
		$this->pdf->SetFont('helvetica', '', 10);
		$html ='
		<table border="1" cellpadding="5">
		<tr style="font-weight:bold">
		<td width="5%">#</td>
		<td width="30%">DIMENSION</td>
		<td width="30%">INDICATORS</td>
		<td width="15%">SCORE</td>
		<td width="20%">BENCHMARK</td>
		</tr>
		<tbody>';
		
		$i = 1;

foreach($this->result->getMainResult($id) as $cat){
	
	$html .=  '<tr>';
		$rowspan = count($cat->cat);
		$html .=  '<td rowspan="'.$rowspan.'">' . $i . '. </td>';
		
		$html .=  '<td rowspan="'.$rowspan.'">'. $cat->main_name_bi .'</td>';
		$pr_num = $id + 2;
		$str_desc .= ' <br /><br /><br /><b>' . $pr_num . '.'.$i.' ' . $cat->main_name_bi . '</b>';
		
		
		$html .=  '<td>'. $cat->cat[0]->cat_text_bi .'</td>';
		
		
		
		$str_desc .= '<b><br /><br />' . $pr_num . '.'.$i.'.1 ' . $cat->cat[0]->cat_text_bi . '</b><br /><br /> ';
		
		$str_desc .=   $cat->cat[0]->desc_intro . '<br /><br />';
		
		$desc = $cat->cat[0]->description;
		$html .=  '<td>';
			$html .=  '<span class="btn btn-outline-'.$desc[1].' btn-sm">' . $cat->cat[0]->result . '</span>';
		$html .=  '</td>';
		$html .=  '<td>';
			$html .=  $cat->cat[0]->benchmark;
		$html .=  '</td>';
		$html .=  '<td>';
		
			$str_desc .=  $desc[0];
		$html .=  '</td>';
	$html .=  '</tr>';
	
	
	array_shift($cat->cat);
	$x = 2;
	foreach($cat->cat as $item){
		$html .=  '<tr>';

		$html .=  '<td>'. $item->cat_text_bi .'</td>';
		
		$str_desc .= '<br /><br /><b>' . $pr_num . '.'.$i.'.'.$x.' ' . $item->cat_text_bi . '</b> ';
		
		$str_desc .=   '<br /><br />' . $item->desc_intro;
		
		$desc = $item->description;
		
		$html .=  '<td>';
			$html .=  '<span class="btn btn-outline-'.$desc[1].' btn-sm">' .$item->result . '</span>';
		$html .=  '</td>';
		$html .=  '<td>';
			$html .=  $item->benchmark;
		$html .=  '</td>';
		$html .=  '<td>';
			$str_desc .=  '<br /><br />' . $desc[0];
		$html .=  '</td>';
	$html .=  '</tr>';
	$x++;
	}
	
	
	
	$i++;
}

$html .= '
		</table>
		
		';
		
		$html .= '' . $str_desc . '';
		
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
		
		
	}
	
	
}
