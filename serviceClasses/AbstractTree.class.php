<?php
#
#  DaCMS Content Management System
#  Copyright (C) 2002 Jan Dankert, jandankert@jandankert.de
#
#  This program is free software; you can redistribute it and/or
#  modify it under the terms of the GNU General Public License
#  as published by the Free Software Foundation; either version 2
#  of the License, or (at your option) any later version.
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License
#  along with this program; if not, write to the Free Software
#  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#

/**
 * Darstellen einer Baumstruktur mit Funktion zum Laden, Oeffnen und Schliessen
 * von Teilbaeumen
 * @author $Author$
 * @version $Revision$
 * @package openrat.services
 */
class AbstractTree
{
	/**
	 * Alle Elemente des Baumes
	 */
	var $elements     = array();
	
	var $tempElements = array();
	var $userIsAdmin  = false;
	
	var $autoOpen     = array(0,1);
	
	/**
	 * Hoechste Element-Id
	 * @type Integer
	 */
	var $maxId;
	
	// Konstruktor
	function AbstractTree()
	{
		// Feststellen, ob der angemeldete Benutzer ein Administrator ist
		$user = Session::getUser();
		$this->userIsAdmin = $user->isAdmin;

		// Wurzel-Element laden
		$this->root();
		$this->elements[0]  = $this->tempElements[0];
		$this->tempElements = array();
		$this->maxId = 0;
		
		foreach( $this->autoOpen as $openId )
			$this->open($openId);
	}

	/**
	 * Oeffnen eines Teilbaumes. Es wird der eindeutige Name des zu oeffnenden Teilbaumes als
	 * Parameter uebergeben
	 * @param elementName der Name des Elementes, welches zu oeffnen ist
	 */
	function open( $elementId )
	{
		$funcName = $this->elements[$elementId]->type;
		if	( empty($funcName) )
			return;
			
		$this->$funcName( $this->elements[$elementId]->internalId );

		// Wenn keine Unterelemente gefunden, dann die ?ffnen-Funktion deaktivieren
		if	( count( $this->tempElements ) == 0 )
			$this->elements[$elementId]->type = '';

		foreach( $this->tempElements as $treeElement )
		{
			$this->maxId++;
			$this->elements[$elementId]->subElementIds[] = $this->maxId;
			$this->elements[$this->maxId] = $treeElement;
		}
		
		if	( count($this->tempElements)==1 )
		{
			$this->tempElements = array();
			$this->open($this->maxId);
		}

		$this->tempElements = array();
	}


	/**
	 * Schliessen eines Teilbaumes
	 * @param elementName der Name des Elementes, welches zu schliessen ist
	 */	

	function close( $elementId )
	{
		$this->elements[$elementId]->subElementIds = array();
	}	


	/**
	 * Hinzufuegen eines Baum-Elementes
	 * @param TreeElement Hinzuzufuegendes Baumelement
	 */
	function addTreeElement( $treeElement )
	{
		$this->tempElements[] = $treeElement;
	}


}

?>