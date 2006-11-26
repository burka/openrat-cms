<?php

/**
 * Darstellung einer Zeile in einem Freitext.<br>
 * <br>
 * Im Konstruktor wird die Zeile analysiert und es wird festgestellt, was
 * die Zeile f�r einen Inhalt hat (z.B. ein Listenelement, eine �berschrift, usw.)<br>
 * 
 * @author Jan Dankert
 * @version $Revision$
 * @package openrat.services
 */
class Line
{
	var $source;                       // Der urspr�ngliche Inhalt
	var $value;                        // Der textuelle Inhalt (sofern vorhanden)
	
	var $isList         = false;       // nicht-numerierte Liste
	var $isNumberedList = false;       // numerierte Liste
	var $indent         = 0;           // Einschubtiefe der Liste
	
	var $isHeadline          = false;  // �berschrift
	var $isHeadlineUnderline = false;  // unterstrichene �berschrift
	var $headlineLevel       = 0;      // Grad der �berschrift (1,2,3...)
	
	
	var $isTableOfContent = false;     // Inhaltsverzeichnis
	var $isTable        = false;       // Tabelle
	var $isCode         = false;       // Code
	var $isQuote        = false;       // Zitat
	var $isQuotePraefix = false;       // Zitatbeginn/-ende
	
	var $isUnparsed     = false;
	
	var $isEmpty        = false;       // Zeile ist leer

	
	
	/**
	 * Erzeugt einen Zeilenobjekt, der Text im Parameter wird dabei geparst.
	 */
	function Line( $s )
	{
		global $conf;
		$text_markup = $conf['editor']['text-markup']; 
		
		$list_numbered   = $text_markup['list-numbered'  ];
		$list_unnumbered = $text_markup['list-unnumbered'];
		$headline        = $text_markup['headline'       ];
		
		$this->source = $s;
		$this->value  = $s;
		
		$this->isList         = $this->isAnErsterStelle(ltrim($s),$list_unnumbered);
		$this->isNumberedList = $this->isAnErsterStelle(ltrim($s),$list_numbered  );
		$this->indent         = strlen($s) - strlen(ltrim($s)) + 1;

		if	( $this->isList || $this->isNumberedList )
			$this->value = ltrim(substr($s,$this->indent));

		$this->level      = strspn( $s,$headline );
		$this->isHeadline = $this->level >= 1;

		if	( $this->isHeadline )
			$this->value = ltrim(substr($s,$this->level));


		$hl = array( 1 => $text_markup['headline_level1_underline'],
		             2 => $text_markup['headline_level2_underline'],
		             3 => $text_markup['headline_level3_underline'] );
		             
		foreach($hl as $lev=>$char )
		{
			if	( substr($s,0,3*strlen($char))==str_repeat($char,3*strlen($char)) )
			{
				$this->isHeadlineUnderline = true;
				$this->level               = intval($lev);
			}
		}
		
		if	( $this->isAnErsterStelle($s,$text_markup['table-of-content']) )
		{
			$this->isTableOfContent  = true;
			$this->value             = '';
		}
		elseif	( $this->isAnErsterStelle($s,$text_markup['table-cell-sep']) )
		{
			$this->isTable           = true;
			$this->value             = '';
		}
		elseif	( $this->isAnErsterStelle($s,$text_markup['pre-begin']) && !$this->isHeadlineUnderline )
		{
			$this->isCode            = true;
			$this->value             = '';
		}
		elseif	( trim($s)==$text_markup['quote-line-begin'] )
		{
			$this->isQuote           = true;
		}
		elseif	( $this->isAnErsterStelle($s,$text_markup['quote']) && strlen(trim($s)>1) )
		{
			$this->isQuotePraefix    = true;
			$this->level         = strspn( str_replace(' ','',$s),$text_markup['quote'] );
		}
		elseif	( $this->isAnErsterStelle($s,'`') )
		{
			$this->isUnparsed = true;
			$this->value      = substr($this->value,1);
		}
		elseif	(  $s == '' )
		{
			$this->isEmpty           = true;
		}
	}


	/**
	 * Stellt fest, ob $wort am Anfang von $text steht.
	 */	
	function isAnErsterStelle( $text,$wort )
	{
		return substr($text,0,strlen($wort))==$wort;
	}
}

?>