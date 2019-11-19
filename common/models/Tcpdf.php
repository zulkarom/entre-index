<?php

namespace common\models;

class Tcpdf extends \TCPDF {
	
	public $header_html;
	
	public $header_first_page_only = false;
	
	public $footer_html;
	
	public $footer_first_page_only = false;
	
	public $top_margin_first_page = -37;
	
	public $font_header = 'times';
	
	public $font_header_size = 10;
	
	public $font_footer = 'times';
	
	public $font_footer_size = 10;
	
	public $margin_footer_bottom = 20;
	

    //Page header
    public function Header() {
		//$this->myX = $this->getX();
		//$this->myY = $this->getY();
		//$savedX = $this->x;
		//savedY = $this->y;
		
		$page = $this->getPage();
		
		$proceed = true;
		if($page == 1){
			$proceed = false;
		}
		
		
        $this->SetFont('times', '', 10);
		$html = $this->header_html;
		if($html and $proceed){
			$this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
			
			$this->SetTopMargin($this->GetY() + $this->top_margin_first_page);
			
			
			
		}else{
	
			$this->SetTopMargin(30);
			//$this->setY(10);
		}
		
	 
		//$this->setX($this->myX);
		//$this->setY($this->myY);
		
		//$this->SetY($savedY);
		//$this->SetX($savedX);

	    
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
		$mr = $this->margin_footer_bottom * -1;
		 $this->SetY($mr);
		 
		 
		$page = $this->getPage();
		
		$proceed = true;
		if($page == 1){
				$proceed = false;
		}
		
		$page = $page - 1 ;
		$total = $this->getAliasNbPages() ;
		
		$html = '<div align="center">' . $page . '</div>';
		
		
        $this->SetFont($this->font_footer, '', $this->font_footer_size);
		if($html and $proceed){
			//$this->SetMargins(0, 0, 0);
			$this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
		}
			
			
		 
        // Set font
        //$this->SetFont('helvetica', 'I', 8);
        // Page number
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
    }
}
