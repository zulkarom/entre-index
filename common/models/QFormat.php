<?php

namespace common\models;

class QFormat 
{
	public static function qtext($bm, $bi){
		if($bm){
			$label =  '<b>'.$bm.'</b>';
			if($bi){
				$label .= '<br />
			<i>'. $bi.'</i>
			';
			}
			return $label;
			
		}else if($bi){
			return '<b>'. $bi .' </b>';
		}
	}
	
	public static function qoption($bm, $bi){
		if($bm){
			$label =  '<b>'.$bm.'</b>';
			if($bi){
				$label .= ' / 
			<i>'. $bi.'</i>
			';
			}
			return $label;
			
		}else if($bi){
			return '<b>'. $bi .' </b>';
		}
	}
	
	public static function qplain($bm, $bi){
		if($bm){
			return $bm.' / '. $bi.'
			';
		}else if($bi){
			return $bi;
		}
	}
	
	public static function qheader($bm, $bi){
		$label = '';
		if($bm){
			$label .= $bm;
			if($bi){
				$label .= '/<i>'. $bi.'</i>';
			}
			return $label; 
		}else if($bi){
			return $bi;
		}
	}
	
	public static function qlikert($val, $bm, $bi){
		$label = '<span id="jwp-struktur-1">';
		if($bm){
			$label .=  '<span class="txt-m">'.$val.' – '.$bm.'</span>';
			if($bi){
				$label .= '/
			<span class="txt-en">'. $bi.'</span>
			';
			}
			
			
		}else if($bi){
			$label = '<span class="txt-m">'.$val.' – '. $bi .' </span>';
		}
		$label .= '</span>';
		return $label;
	}
	
	public static function qcat($bm, $bi){
		$label = '';
		if($bm){
			$label .=  '<span class="txt-m">'.$bm.'</span>';
			if($bi){
				$label .= '</br /></br />
			<span class="txt-en">'. $bi.'</span>
			';
			}
			
			
		}else if($bi){
			$label = '<span class="txt-m">'. $bi .' </span>';
		}
		return $label;
		
	}
}
