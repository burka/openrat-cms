<?php

/**
 * Bereitstellen von Methoden fuer das Lesen von Einstellungen
 *
 * @author $Author$
 * @version $Revision$
 * @package openrat.services
 */
class Preferences
{
	function load( $dir='' )
	{
		if	( !defined('QUOTE') )
			define('QUOTE','"');
		
		$values = array();
		
		// Bei erstem (nicht-rekursiven) Aufruf der Methoden das Konfigurationsverzeichnis voreinstellen 
		if	( empty($dir) )
		{
			if	( isset($_GET['config']) )
				$dir = basename( $_GET['config'] ).'/';
			else
				$dir = OR_PREFERENCES_DIR;
		}
			
		if	( !is_dir($dir) )
		{
			Http::sendStatus(501,'Internal Server Error','not a directory: '.$dir);
			exit;
		}
		
		if	( $dh = opendir($dir) )
		{
			while( ($verzEintrag = readdir($dh)) !== false )
			{
				$filename = $dir.$verzEintrag;
				
				if	( is_file($filename) && eregi('\.(ini.*|conf)$',$verzEintrag) )
				{
					$nameBestandteile = explode('.',$verzEintrag);
					
				    $values[$nameBestandteile[0]] = parse_ini_file( $filename,true );
				}
	        }
	        closedir($dh);
	    }
	    else
	    {
			die('unable to open directory: '.$dir);
	    }

		ksort($values);

		return $values;
	}
}
?>