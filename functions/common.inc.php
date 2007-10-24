<?php


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

?>