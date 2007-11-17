<?php

/**
 * Werkzeugklasse f�r Datei-Operationen.
 *
 */
class FileUtils
{
	/**
	 * F�gt einen Slash ("/") an das Ende an, sofern nicht bereits vorhanden.
	 *
	 * @param String $pfad
	 * @return Pfad mit angeh�ngtem Slash.
	 */
	function slashify($pfad)
	{
		if	( substr($pfad,-1,1) == '/')
			return $pfad;
		else
			return $pfad.'/';
	}
	
	
	/**
	 * Ermittelt das tempor�re Verzeichnis.
	 *
	 * @return String
	 */
	function getTempDir()
	{
		$tmpFilename = tempnam(ini_get('upload_tmp_dir'),"bla");
		@unlink($tmpFilename);
		return FileUtils::slashify( dirname($tmpFilename) );
	}
}

?>