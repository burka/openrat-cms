<?php
// OpenRat Content Management System
// Copyright (C) 2002-2010 Jan Dankert, jandankert@jandankert.de
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
 * Logische Darstellung eines Templates
 *
 * @author: $Author$
 * @version: $Revision$
 * @package openrat.objects
 */ 
class Template
{
	/**
	 * ID dieses Templates
	 * @type Integer
	 */
	var $templateid = 0;

	/**
	 * Projekt-ID des aktuell ausgew?hlten Projektes
	 * @type Integer
	 */
	var $projectid = 0;

	/**
	 * Logischer Name
	 * @type String
	 */
	var $name = 'unnamed';
	
	/**
	 * ID der Projektvariante
	 * @type Integer
	 */
	var $modelid = 0;

	/**
	 * Dateierweiterung dieses Templates (abh?ngig von der Projektvariante)
	 * @type String
	 */
	var $extension='';

	/**
	 * Inhalt des Templates (abh?ngig von der Projektvariante)
	 * @type String
	 */
	var $src='';
	
	// Konstruktor
	function Template( $templateid='' )
	{
		$model   = Session::getProjectModel();
		$project = Session::getProject();
		if	( is_object($model) )
			$this->modelid   = $model->modelid;
		if	( is_object($project) )
			$this->projectid = $project->projectid;

		if   ( is_numeric($templateid) )
			$this->templateid = $templateid;
	}


	/**
 	 * Ermitteln aller Templates in dem aktuellen Projekt.
 	 * @return Array mit Id:Name
 	 */
	function getAll()
	{
		global $SESS;
		$db = db_connection();

		$sql = new Sql( 'SELECT id,name FROM {t_template}'.
		                ' WHERE projectid={projectid}'.
		                ' ORDER BY name ASC '  );
		if	( isset($this->projectid) )
			$sql->setInt( 'projectid',$this->projectid   );
		else
		{
			$project = Session::getProject();
			$sql->setInt( 'projectid',$project->projectid );
		}

		return $db->getAssoc( $sql );
	}


	/**
 	 * Laden des Templates aus der Datenbank und f?llen der Objekteigenschaften
 	 */
	function load()
	{
		global $SESS;
		$db = db_connection();

		$sql = new Sql( 'SELECT * FROM {t_template}'.
		                ' WHERE id={templateid}' );
		$sql->setInt( 'templateid',$this->templateid );
		$row = $db->getRow( $sql );

		$this->name      = $row['name'     ];
		$this->projectid = $row['projectid'];

		$sql = new Sql( 'SELECT * FROM {t_templatemodel}'.
		                ' WHERE templateid={templateid}'.
		                '   AND projectmodelid={modelid}' );
		$sql->setInt( 'templateid',$this->templateid );
		$sql->setInt( 'modelid'   ,$this->modelid    );
		$row = $db->getRow( $sql );

		if	( isset($row['extension']) )
		{
			$this->extension = $row['extension'];
			$this->src       = $row['text'];
		}
		
	}


	/**
 	 * Abspeichern des Templates in der Datenbank
 	 */
	function save()
	{
		if	( $this->name == "" )
			$this->name = lang('GLOBAL_TEMPLATE').' #'.$this->templateid;

		$db = db_connection();

		$sql = new Sql( 'UPDATE {t_template}'.
		                '  SET name={name}'.
		                '  WHERE id={templateid}' );
		$sql->setString( 'name'      ,$this->name       );
		$sql->setInt   ( 'templateid',$this->templateid );
		$db->query( $sql );

		$sql = new Sql( 'SELECT COUNT(*) FROM {t_templatemodel}'.
		                ' WHERE templateid={templateid}'.
		                '   AND projectmodelid={modelid}' );
		$sql->setInt   ( 'templateid'    ,$this->templateid     );
		$sql->setInt   ( 'modelid'       ,$this->modelid );

		if	( intval($db->getOne($sql)) > 0 )
		{		
			$sql = new Sql( 'UPDATE {t_templatemodel}'.
			                '  SET extension={extension},'.
			                '      text={src} '.
			                ' WHERE templateid={templateid}'.
			                '   AND projectmodelid={modelid}' );
		}
		else
		{
			$sql = new Sql('SELECT MAX(id) FROM {t_templatemodel}');
			$nextid = intval($db->getOne($sql))+1;
			$sql = new Sql( 'INSERT INTO {t_templatemodel}'.
			                '        (id,templateid,projectmodelid,extension,text) '.
			                ' VALUES ({id},{templateid},{modelid},{extension},{src}) ');
			$sql->setInt   ( 'id',$nextid         );
		}

		$sql->setString( 'extension'     ,$this->extension      );
		$sql->setString( 'src'           ,$this->src            );
		$sql->setInt   ( 'templateid'    ,$this->templateid     );
		$sql->setInt   ( 'modelid'       ,$this->modelid        );
		
		$db->query( $sql );
	}


	/**
	  * Es werden Templates mit einem Inhalt gesucht
	  * @param String Suchbegriff
	  * @return Array Liste der gefundenen Template-IDs
	  */
	function getTemplateIdsByValue( $text )
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT templateid FROM {t_templatemodel}'.
		                ' WHERE text LIKE {text} '.
		                '   AND projectmodelid={modelid}' );

		$sql->setInt   ( 'modelid',$this->modelid );
		$sql->setString( 'text'   ,'%'.$text.'%'  );
		
		return $db->getCol( $sql );
	}


	/**
 	 * Ermitteln aller Elemente zu diesem Template
 	 * Es wird eine Liste nur mit den Element-IDs ermittelt und zur?ckgegeben
 	 * @return Array
 	 */
	function getElementIds()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT id FROM {t_element}'.
		                '  WHERE templateid={templateid}'.
		                '  ORDER BY name ASC' );
		$sql->setInt( 'templateid',$this->templateid );
		return $db->getCol( $sql );
	}



	/**
 	 * Ermitteln aller Elemente zu diesem Template
 	 * Es wird eine Liste mit den kompletten Elementen ermittelt und zurueckgegeben
 	 * @return Array
 	 */
	function getElements()
	{
		$list = array();
		$db = db_connection();

		$sql = new Sql( 'SELECT * FROM {t_element}'.
		                '  WHERE templateid={templateid}'.
		                '  ORDER BY name ASC' );
		$sql->setInt( 'templateid',$this->templateid );
		foreach( $db->getAll( $sql ) as $row )
		{
			$e = new Element( $row['id'] );
			$e->setDatabaseRow( $row );
			
			$list[$e->elementid] = $e;
			unset($e);
		}
		return $list;
	}



	/**
 	 * Ermitteln aller Elemente zu diesem Template
 	 * Es wird eine Liste mit den kompletten Elementen ermittelt und zurueckgegeben
 	 * @return Array
 	 */
	function getWritableElements()
	{
		$list = array();
		$e = new Element();
		$readonlyList = "'".implode("','",$e->readonlyElementNames)."'";
		
		$db = db_connection();

		$sql = new Sql( <<<SQL
SELECT * FROM {t_element}
  WHERE templateid={templateid}
    AND writable=1
    AND type NOT IN ($readonlyList)
  ORDER BY name ASC
SQL
);
		$sql->setInt       ( 'templateid'  ,$this->templateid        );
		foreach( $db->getAll( $sql ) as $row )
		{
			$e = new Element( $row['id'] );
			$e->setDatabaseRow( $row );
			
			$list[$e->elementid] = $e;
			unset($e);
		}
		return $list;
	}



	/**
 	 * Ermitteln aller Elemente zu diesem Template
 	 * Es wird eine Liste mit den Element-Namen zur?ckgegeben
 	 * @return Array
 	 */
	function getElementNames()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT id,name FROM {t_element}'.
		                '  WHERE templateid={templateid}'.
		                '  ORDER BY name ASC' );
		$sql->setInt( 'templateid',$this->templateid );

		return $db->getAssoc( $sql );
	}


	/**
 	 * Hinzuf?gen eines Elementes
 	 * @param String Name des Elementes
 	 */
	function addElement( $name,$description='',$type='text' )
	{
		$element = new Element();
		$element->name       = $name;
		$element->desc       = $description;
		$element->type       = $type;
		$element->templateid = $this->templateid;
		$element->wiki       = true;
		$element->writable   = true;
		$element->add();
	}


	/**
 	 * Hinzufuegen eines Templates
 	 * @param String Name des Templates (optional)
 	 */
	function add( $name='' )
	{
		if	( !empty($name) )
			$this->name = $name;

		$db = db_connection();

		$sql = new Sql('SELECT MAX(id) FROM {t_template}');
		$this->templateid = intval($db->getOne($sql))+1;

		$sql = new Sql( 'INSERT INTO {t_template}'.
		                ' (id,name,projectid)'.
		                ' VALUES({templateid},{name},{projectid})' );
		$sql->setInt   ('templateid',$this->templateid   );
		$sql->setString('name'      ,$name               );

		// Wenn Projektid nicht vorhanden, dann aus Session lesen
		if	( !isset($this->projectid) || intval($this->projectid) == 0 )
		{
			$project = Session::getProject();
			$this->projectid = $project->projectid;
		}

		$sql->setInt   ('projectid' ,$this->projectid );

		$db->query( $sql );
	}


	/**
 	 * Ermitteln alles Objekte (=Seiten), welche auf diesem Template basieren
 	 * @return Array Liste von Objekt-IDs
 	 */
	function getDependentObjectIds()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT objectid FROM {t_page}'.
		                '  WHERE templateid={templateid}' );
		$sql->setInt( 'templateid',$this->templateid );

		return $db->getCol( $sql );
	}


	/**
 	 * Loeschen des Templates
 	 *
 	 * Entfernen alle Templateinhalte und des Templates selber
 	 */
	function delete()
	{
		$db = db_connection();
		
		foreach( $this->getElementIds() as $elementid )
		{
			$element = new Element( $elementid );
			$element->delete();
		}

		$sql = new Sql( 'DELETE FROM {t_templatemodel}'.
		                ' WHERE templateid={templateid}' );
		$sql->setInt( 'templateid',$this->templateid );
		$db->query( $sql );

		$sql = new Sql( 'DELETE FROM {t_template}'.
		                ' WHERE id={templateid}' );
		$sql->setInt( 'templateid',$this->templateid );
		$db->query( $sql );
	}
	
	
	/**
	 * Ermittelt den Mime-Type zu diesem Template.
	 * 
	 * Es wird die Extension des Templates betrachtet und dann mit Hilfe der
	 * Konfigurationsdatei 'mime-types.ini' der Mime-Type bestimmt. 
	 *
	 * @return String Mime-Type  
	 */
	function mimeType()
	{
		global $conf;
		$mime_types = $conf['mime-types'];

		// Nur den letzten Teil der Extension auswerten:
		// Aus 'mobile.html' wird nur 'html' verwendet.
		$extension = strtolower(array_pop(explode('.',$this->extension)));

		if	( !empty($mime_types[$extension]) )
			$this->mime_type = $mime_types[$extension];
		else
			// Wenn kein Mime-Type gefunden, dann Standartwert setzen
			$this->mime_type = 'application/octet-stream';
			
		return( $this->mime_type );
	}
	
}

?>