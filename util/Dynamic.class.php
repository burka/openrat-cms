<?php
// OpenRat Content Management System
// Copyright (C) 2002-2012 Jan Dankert, cms@jandankert.de
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.


/**
 * Service-Klasse fuer allgemeine Interface-Methoden. Insbesondere
 * in Code-Elementen kann und soll auf diese Methoden zurueckgegriffen
 * werden.
 * @author $Author$
 * @version $Revision$
 * @package openrat.services
 */
class Dynamic
{
	var $project;
	var $output   = '';
	var $objectid = 0;
	var $page;
	var $parameters  = array();
	var $description = '';

	
	/**
	 * Ausführen des Makros. Diese Methode sollte durch die Unterklasse überschrieben werden.
	 */
	public function execute()
	{
		// overwrite this in subclasses
	}
	
	
	/**
	 * Holt die aktuellen Datenbankverbindung.
	 */
	public function db()
	{
		return db_connection();
	}

	
	/**
	 * Holt die aktuelle Objekt-Id.
	 * @return number
	 */
	public function getObjectId()
	{
		return $this->objectid;
	}

	
	/**
	 * Holt das aktuelle Objekt.
	 * @return Object
	 */
	public function &getObject()
	{
		return Session::getObject();
	}

	
	/**
	 * Setzt eine Objekt-Id.
	 * @param unknown_type $objectid
	 */
	public function setObjectId( $objectid )
	{
		$this->objectid = $objectid;
	}

	
	/**
	 * Ermittelt die Id des Wurzelordners im aktuellen Projekt. 
	 */
	public function getRootObjectId()
	{
		$project = Session::getProject();
		return $project->getRootObjectId();
	}

	
	/**
	 * DO NOT USE.
	 */
	public function folderid()
	{
		global $SESS;
		return $SESS['folderid'];
	}


	/**
	 * Löscht die bisher erzeugte Ausgabe.
	 */
	public function delOutput()
	{
		$this->output = '';
	}
	
	/**
	 * Ergänzt die Standardausgabe um den gewünschten Wert. 
	 */
	public function output( $text )
	{
		$this->output .= $text;
	}

	
	/**
	 * Ergänzt die Standardausgabe um den gewünschten Wert. Es wird ein Zeilenendezeichen ergänzt. 
	 */
	public function outputLn( $text )
	{
		$this->output .= $text."\n";
	}


	/**
	 * Ermittelt die bisher erstellte Ausgabe.
	 * @return string
	 */
	public function getOutput()
	{
		return $this->output;
	}
	
	
	/**
	 * Setzt eine Sitzungsvariable.
	 * 
	 * @param String $var
	 * @param Object $value
	 */
	public function setSessionVar( $var,$value )
	{
		Session::set( $var,$value );
	}


	/**
	 * Ermittelt eine Sitzungsvariable.
	 * 
	 * @param String $var
	 * @return string
	 */
	public function getSessionVar( $var )
	{
		return Session::get( $var );
	}


	
	/**
	 * Ermittelt den Pfad auf ein Objekt.
	 * @param Objekt oder Objekt-Id
	 */
	public function pathToObject( $obj )
	{
		if	( is_object($obj) )
			return $this->page->path_to_object($obj->objectid);
		else
			return $this->page->path_to_object($obj);
	}

}