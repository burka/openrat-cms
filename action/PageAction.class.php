<?php
// ---------------------------------------------------------------------------
// $Id$
// ---------------------------------------------------------------------------
// OpenRat Content Management System
// Copyright (C) 2002-2004 Jan Dankert, cms@jandankert.de
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
//

/**
 * Action-Klasse zum Bearbeiten einer Seite
 * @author $Author$
 * @version $Revision$
 * @package openrat.actions
 */

class PageAction extends ObjectAction
{
	var $page;
	var $defaultSubAction = 'show';


	function PageAction()
	{
		if	( $this->getRequestId() != 0  )
		{
			$this->page = new Page( $this->getRequestId() );
			$this->page->load();
			Session::setObject( $this->page );
		}
		else
		{
			$this->page = Session::getObject();
		}
		
		// Hier kann leider nicht das Datum der letzten Änderung verwendet werden,
		// da sich die Seite auch danach ändern kann, z.B. durch Includes anderer
		// Seiten oder Änderung einer Vorlage oder Änderung des Dateinamens einer
		// verlinkten Datei. 
		$this->lastModified( time() );
	}


	/**
	 * Alle Daten aus dem Formular speichern
	 */
	function saveform()
	{
		$this->page->public = true;
		$this->page->simple = true;

		foreach( $this->page->getElements() as $elementid=>$name )
		{
			if   ( $this->hasRequestVar('saveid'.$elementid) )
			{
				$value = new Value();
				$value->objectid   = $this->page->objectid;
				$value->pageid     = Page::getPageIdFromObjectId( $value->objectid );
				$value->element = new Element( $elementid );
				$value->element->load();
				$value->publish = false;
				$value->load();
		
				// Eingegebenen Inhalt aus dem Request lesen
				$inhalt  = $this->getRequestVar( 'id'.$elementid );
				
				// Den Inhalt speichern.
				switch( $value->element->type )
				{
					case 'number':
						$value->number = $inhalt * pow(10,$value->element->decimals);
						break;

					case 'date':
						$value->date = strtotime( $inhalt );
						break;

					case 'text':
					case 'longtext':
					case 'select':
						$value->text = $inhalt;
						break;

					case 'link':
					case 'list':
					case 'insert':
						$value->linkToObjectId = intval($inhalt);
						break;
				}
			
				$value->page = &$this->page;
				
				// Ermitteln, ob Inhalt sofort freigegeben werden kann und soll
				if	( $this->page->hasRight( ACL_RELEASE ) && $this->hasRequestVar('release') )
					$value->publish = true;
				else
					$value->publish = false;
		
//				Html::debug($inhalt,'Eingabe');
//				Html::debug($value,'Inhalt');
		
				// Inhalt speichern.
				// Inhalt in allen Sprachen gleich?
				if	( $value->element->allLanguages )
				{
					// Inhalt fuer jede Sprache einzeln speichern.
					$p = new Project();
					foreach( $p->getLanguageIds() as $languageid )
					{
						$value->languageid = $languageid;
						$value->save();
					}
				}
				else
				{
					// sonst nur 1x speichern (fuer die aktuelle Sprache)
					$value->languageid = $this->getSessionVar(REQ_PARAM_LANGUAGE_ID);
					$value->save();
				}
			}
		}
		$this->page->setTimestamp(); // "Letzte Aenderung" setzen

		if	( $this->hasRequestVar('publish') )
			$this->callSubAction( 'pubnow' );
		else
			$this->callSubAction( 'el' );
	}


	/**
	 * Element speichern
	 *
	 * Der Inhalt eines Elementes wird abgespeichert
	 */
	function elsave()
	{
		$value = new Value();
		$language = Session::getProjectLanguage();
		$value->languageid = $language->languageid;
		$value->objectid   = $this->page->objectid;
		$value->pageid     = Page::getPageIdFromObjectId( $this->page->objectid );

		if	( $this->hasRequestVar('elementid') )
			$value->element = new Element( $this->getRequestVar('elementid') );
		else
			$value->element = Session::getElement();

		$value->element->load();
		$value->publish = false;
		$value->load();

		$value->number         = $this->getRequestVar('number') * pow(10,$value->element->decimals);
		$value->linkToObjectId = intval($this->getRequestVar('linkobjectid'));
		$value->text           = $this->getRequestVar('text');

		// Vorschau anzeigen
		if	( $value->element->type=='longtext' && ($this->hasRequestVar('preview')||$this->hasRequestVar('addmarkup')) )
		{
			if	( $this->hasRequestVar('preview') )
			{
				$value->page             = $this->page;
				$value->simple           = false;
				$value->page->languageid = $value->languageid;
				$value->page->load();
				$value->generate();
				$this->setTemplateVar('preview_text',$value->value );
			}

			if	( $this->hasRequestVar('addmarkup') )
			{
				$addText = $this->getRequestVar('addtext');

				if	( !empty($addText) ) // Nur, wenn ein Text eingegeben wurde
				{
					$addText = $this->getRequestVar('addtext');

					if	( $this->hasRequestVar('strong') )
						$value->text .= '*'.$addText.'*';

					if	( $this->hasRequestVar('emphatic') )
						$value->text .= '_'.$addText.'_';

					if	( $this->hasRequestVar('link') )
						$value->text .= '"'.$addText.'"->"'.$this->getRequestVar('objectid').'"';
				}

				if	( $this->hasRequestVar('table') )
					$value->text .= "|$addText  |  |\n|$addText  |  |\n|$addText  |  |\n";

				if	( $this->hasRequestVar('list') )
					$value->text .= "\n- ".$addText."\n".'- '.$addText."\n".'- '.$addText."\n";

				if	( $this->hasRequestVar('numlist') )
					$value->text .= "\n# ".$addText."\n".'# '.$addText."\n".'# '.$addText."\n";

				if	( $this->hasRequestVar('image') )
					$value->text .= '{'.$this->getRequestVar('objectid').'}';
			}

			// Ermitteln aller verlinkbaren Objekte (fuer Editor)
			$objects = array();
	
			foreach( Folder::getAllObjectIds() as $id )
			{
				$o = new Object( $id );
				$o->load();
				
				if	( $o->getType() != 'folder' )
				{ 
					$f = new Folder( $o->parentid );
					$objects[ $id ]  = lang( 'GLOBAL_'.$o->getType() ).': '; 
					$objects[ $id ] .=  implode( FILE_SEP,$f->parentObjectNames(false,true) ); 
					$objects[ $id ] .= FILE_SEP.$o->name;
				} 
			}
			asort($objects);
			$this->setTemplateVar( 'objects' ,$objects );
	
			$this->setTemplateVar( 'release' ,$this->page->hasRight(ACL_RELEASE) );
			$this->setTemplateVar( 'publish' ,$this->page->hasRight(ACL_PUBLISH) );
			$this->setTemplateVar( 'html'    ,$value->element->html );
			$this->setTemplateVar( 'wiki'    ,$value->element->wiki );
			$this->setTemplateVar( 'text'    ,$value->text          );
			$this->setTemplateVar( 'name'    ,$value->element->name );
			$this->setTemplateVar( 'desc'    ,$value->element->desc );
			$this->setTemplateVar( 'objectid',$this->page->objectid );
			return;
		}

		if	( $this->hasRequestVar('year') ) // Wird ein Datum gespeichert?
		{
			// Wenn ein ANSI-Datum eingegeben wurde, dann dieses verwenden
			if   ( $this->getRequestVar('ansidate') != $this->getRequestVar('ansidate_orig') )
				$value->date = strtotime($this->getRequestVar('ansidate') );
			else
				// Sonst die Zeitwerte einzeln zu einem Datum zusammensetzen
				$value->date = mktime( $this->getRequestVar('hour'  ),
				                       $this->getRequestVar('minute'),
				 	                   $this->getRequestVar('second'),
				 	                   $this->getRequestVar('month' ),
					                   $this->getRequestVar('day'   ),
					                   $this->getRequestVar('year'  ) );
		}
		else $value->date = 0; // Datum nicht gesetzt.
	
		$value->text = $this->getRequestVar('text');

		$value->page = new Page( $value->objectid );
		$value->page->load();
		
		// Inhalt sofort freigegeben, wenn
		// - Recht vorhanden
		// - Freigabe gewuenscht
		if	( $value->page->hasRight( ACL_RELEASE ) && $this->getRequestVar('release')!='' )
			$value->publish = true;
		else
			$value->publish = false;

		// Inhalt speichern
		
		// Wenn Inhalt in allen Sprachen gleich ist, dann wird der Inhalt
		// fuer jede Sprache einzeln gespeichert.
		if	( $value->element->allLanguages )
		{
			$project = Session::getProject();
			foreach( $project->getLanguageIds() as $languageid )
			{
				$value->languageid = $languageid;
				$value->save();
			}
		}
		else
		{
			// sonst nur 1x speichern (fuer die aktuelle Sprache)
			$value->save();
		}

		$this->page->setTimestamp(); // "Letzte Aenderung" setzen

		// Falls ausgewaehlt die Seite sofort veroeffentlichen
		if	( $this->hasRequestVar('publish') )
			$this->callSubAction( 'pubnow' ); // Weiter zum veroeffentlichen
		else
			$this->callSubAction( 'el' ); // Element-Liste anzeigen
	}



	/**
	 * Eigenschaften der Seite speichern
	 */
	function propAction()
	{
		if   ( $this->getRequestVar('name')!='' )
		{
			$this->page->name        = $this->getRequestVar('name'       ,OR_FILTER_FULL    );
			$this->page->filename    = $this->getRequestVar('filename'   ,OR_FILTER_FILENAME);
			$this->page->desc        = $this->getRequestVar('description',OR_FILTER_FULL    );

			$this->page->save();
			$this->addNotice($this->page->getType(),$this->page->name,'PROP_SAVED','ok');
		}
		else
		{
			$this->addValidationError('name');
			$this->callSubAction('prop');
		}
	}



	/**
	 * Die Eigenschaften der Seite anzeigen
	 */
	function propView()
	{
		$this->setTemplateVar('id',$this->page->objectid);
	
		$this->page->public = true;
		$this->page->load();
		$this->page->full_filename();

		if	( $this->page->filename == $this->page->objectid )
			$this->page->filename = '';

		$this->setTemplateVars( $this->page->getProperties() );
		
		if   ( $this->userIsAdmin() )
		{
			$this->setTemplateVar('template_url',Html::url('main','template',$this->page->templateid));
		}
	
		$template = new Template( $this->page->templateid );
		$template->load();
		$this->setTemplateVar('template_name',$template->name);
	
		// Alle Ordner ermitteln
//		$this->setTemplateVar('act_folderobjectid',$this->page->parentid);
//
//		$folders = array();
//		$folder = new Folder( $this->page->parentid );
		
//		foreach( $folder->getOtherFolders() as $oid )
//		{
//			$f = new Folder( $oid );
//			$folders[$oid] = implode( FILE_SEP,$f->parentObjectNames(true,true) );
//		}
//		asort( $folders );
//		$this->setTemplateVar('folder',$folders); 

		$templates = Array();
		foreach( Template::getAll() as $id=>$name )
		{
			if	( $id != $this->page->templateid )
				$templates[$id]=$name;
		}
		$this->setTemplateVar('templates',$templates); 
	}
	


	/**
	 * Austauschen der Vorlage vorbereiten
	 *
	 * Es wird ein Formualr erzeugt, in dem der Benutzer auswaehlen kann, welche Elemente
	 * in welches Element uebernommen werden sollen
	 */
	function changetemplateselectelements()
	{
		$newTemplateId = intval($this->getRequestVar('templateid'));

		if   ( $newTemplateId != 0  )
		{
			$this->setTemplateVar('newTemplateId',$newTemplateId );

			$oldElements = array();
			$oldTemplate = new Template( $this->page->templateid );
			$newTemplate = new Template( $newTemplateId );
			
			foreach( $oldTemplate->getElementIds() as $elementid )
			{
				$e = new Element( $elementid );
				$e->load();
				
				if	( !$e->isWritable() )
					continue;

				$oldElement = array();
				$oldElement['name'] = $e->name.' - '.lang('EL_'.$e->type );
				$oldElement['id'  ] = $e->elementid;

				$newElements = Array();
				$newElements[0] = lang('ELEMENT_DELETE_VALUES');
	
				foreach( $newTemplate->getElementIds() as $newelementid )
				{
					$ne = new Element( $newelementid );
					$ne->load();
					
					// Nur neue Elemente anbieten, deren Typ identisch ist
					if	( $ne->type == $e->type )
						$newElements[$newelementid] = lang('ELEMENT').': '.$ne->name.' - '.lang('EL_'.$e->type );
				}
				$oldElement['newElementsName'] = 'from'.$e->elementid;
				$oldElement['newElementsList'] = $newElements;
				$oldElements[$elementid] = $oldElement;
			}
			$this->setTemplateVar('elements',$oldElements );
		}
		else
		{
			$this->callSubAction('prop');
		}
	}



	/**
	 * Die Vorlage der Seite austauschen
	 *
	 * Die Vorlage wird ausgetauscht, die Inhalte werden gemaess der Benutzereingaben kopiert
	 */
	function replacetemplate()
	{
		$newTemplateId = intval($this->getRequestVar('newTemplateId'));
		$replaceElementMap = Array();
		
		$oldTemplate = new Template( $this->page->templateid );
		foreach( $oldTemplate->getElementIds() as $elementid )
			$replaceElementMap[$elementid] = $this->getRequestVar('from'.$elementid);
		
		if	( $newTemplateId != 0  )
		{
			$this->page->replaceTemplate( $newTemplateId,$replaceElementMap );
			$this->addNotice('page',$this->page->name,'SAVED',OR_NOTICE_OK);
		}
		else
			$this->addNotice('page',$this->page->name,'NOT_SAVED',OR_NOTICE_WARN);
	}




	/**
	 * Alle Elemente der Seite anzeigen
	 */
	function el()
	{
		$this->page->public = true;
		$this->page->simple = true;
		$this->page->generate_elements();
		
		$list = array();
	
		// Schleife ueber alle Inhalte der Seite
		foreach( $this->page->values as $id=>$value )
		{
			// Element wird nur angezeigt, wenn es editierbar ist
			if   ( $value->element->isWritable() )
			{
				$list[$id] = array();
				$list[$id]['name']       = $value->element->name;
				$list[$id]['url' ]       = Html::url( 'pageelement','edit'   ,$this->page->id,array('elementid'=>$id,'mode'=>'edit') );
				$list[$id]['desc']       = $value->element->desc;
				$list[$id]['type']       = $value->element->type;
	
				$list[$id]['archive_count'] = intval($value->getCountVersions());
				if	( $list[$id]['archive_count'] > 0 )
					$list[$id]['archive_url'] = Html::url( 'pageelement','archive',$this->page->id,array('elementid'=>$id) );
				
				// Maximal 50 Stellen des Inhaltes anzeigen
				$list[$id]['value'] = Text::maxLaenge( 50,$value->value );
			}
		}

		$this->setTemplateVar('el',$list);
	}


	/**
	 * Alle editierbaren Felder in einem Formular bereitstellen
	 */
	function form()
	{
		global $conf_php;

		$this->page->public = false;
		$this->page->simple = true;
		$this->page->generate_elements();
		
		$list = array();
	
		foreach( $this->page->values as $id=>$value )
		{
			if   ( $value->element->isWritable() )
			{
				$list[$id] = array();
				$list[$id]['name']        = $value->element->name;
				$list[$id]['desc']        = $value->element->desc;
				$list[$id]['type']        = $value->element->type;
				$list[$id]['id'  ]        = 'id'.$value->element->elementid;
				$list[$id]['saveid']      = 'saveid'.$value->element->elementid;

				switch( $value->element->type )
				{
					case 'text':
					case 'longtext':
						$list[$id]['value'] = $value->text;
						break;

					case 'date':
						$list[$id]['value'] = date( 'Y-m-d H:i:s',$value->date );
						break;

					case 'number':
						$list[$id]['value'] = $value->number / pow(10,$value->element->decimals);
						break;

					case 'select':
						$list[$id]['list' ] = $value->element->getSelectItems();
						$list[$id]['value'] = $value->text;
						break;

					case 'link':
						$objects = array();
				
						foreach( Folder::getAllObjectIds() as $oid )
						{
							$o = new Object( $oid );
							$o->load();
							
							if	( $o->getType() != 'folder' )
							{ 
								$f = new Folder( $o->parentid );
								$f->load();
								
								$objects[ $oid ]  = lang( $o->getType() ).': '; 
								$objects[ $oid ] .=  implode( ' &raquo; ',$f->parentObjectNames(false,true) ); 
								$objects[ $oid ] .= ' &raquo; '.$o->name;
							} 
						}
		
						asort( $objects ); // Sortieren
				
						$list[$id]['list' ] = $objects;
						$list[$id]['value'] = $value->linkToObjectId;
						break;

					case 'list':
						$objects = array();
						foreach( Folder::getAllFolders() as $oid )
						{
							$f = new Folder( $oid );
							$f->load();
							
							$objects[ $oid ]  = lang( $f->getType() ).': '; 
							$objects[ $oid ] .=  implode( ' &raquo; ',$f->parentObjectNames(false,true) ); 
						}
				
						asort( $objects ); // Sortieren
				
						$this->setTemplateVar('list' ,$objects);
						$this->setTemplateVar('value',$this->value->linkToObjectId);
		
						break;
				}
			}
		}

		$this->setTemplateVar( 'release',$this->page->hasRight(ACL_RELEASE) );
		$this->setTemplateVar( 'publish',$this->page->hasRight(ACL_PUBLISH) );

		$this->setWindowMenu( 'elements' );
		$this->setTemplateVar('el',$list);
	}



	/**
	 * Seite anzeigen
	 */
	function show()
	{
		$this->setTemplateVar('preview_url',Html::url('page','preview',$this->page->objectid,array('target'=>'none') ) );
	}

		/**
	 * Seite anzeigen
	 */
	function preview()
	{
		Logger::debug("preview von seite");
		// Seite definieren
		$this->page->load();
		$this->page->generate();
		$this->page->write();

		header('Content-Type: '.$this->page->mimeType().'; charset='.$this->getCharset() );

		// HTTP-Header mit Sprachinformation setzen.
		$language = Session::getProjectLanguage();
		header('Content-Language: '.$language->isoCode);

		Logger::debug("preview von seite: ".$this->page->tmpfile() );
		
		// Wenn 
		if	( ( config('publish','enable_php_in_page_content')=='auto' && $this->page->template->extension == 'php') ||
		        config('publish','enable_php_in_page_content')===true )
			require( $this->page->tmpfile() );
		else
			readfile( $this->page->tmpfile() );
	}

	

	/**
	 * Die Seite im Bearbeitungsmodus anzeigen
	 *
	 * Bei editierbaren Feldern wird ein Editor-Ikon vorangestellt.
	 */
	function edit()
	{
		// Editier-Icons anzeigen
		$this->page->icons = true;
	
		$this->page->load();
		$this->page->generate();
		$this->page->write();
		
		header('Content-Type: '.$this->page->mimeType().'; charset='.$this->getCharset() );
		
		// HTTP-Header mit Sprachinformation setzen.
		$language = Session::getProjectLanguage();
		header('Content-Language: '.$language->isoCode);

		
		// Wenn 
		if	( ( config('publish','enable_php_in_page_content')=='auto' && $this->page->template->extension == 'php') ||
		        config('publish','enable_php_in_page_content')===true )
			require( $this->page->tmpfile() );
		else
			readfile( $this->page->tmpfile() );
		
		// Inhalt ist ausgegeben... Skript beenden.
		exit;
	}



	/**
	 * Den Quellcode der Seite anzeigen
	 *
	 * Alle HTML-Sonderzeichen werden maskiert
	 */
	function src()
	{
		$language = Session::getProjectLanguage();
		$model    = Session::getProjectModel();
		
		$this->page->languageid = $language->languageid;
		$this->page->modelid    = $model->modelid;

		$this->page->withLanguage = config('publish','filename_language') == 'always' || count(Language::count()) > 1;
		$this->page->withModel    = config('publish','filename_type'    ) == 'always' || count(Model::count()   ) > 1;
		
		$this->page->public     = true;
		$this->page->load();

		$src = $this->page->generate();
		
		// HTML Highlighting
		
		//$src = preg_replace( '|<(.+)( .+)?'.'>|Us'       , '<strong>&lt;$1</strong>$2<strong>&gt;</strong>', $src);
		//$src = preg_replace( '|([a-zA-Z]+)="(.+)"|Us' , '<em>$1</em>=<var>"$2"</var>'                   , $src);
		$src = htmlentities($src);
		
		$this->setTemplateVar('src',$src);
	}




	/**
	 * Die Eigenschaften der Seite anzeigen
	 */
	function changetemplate()
	{
		$this->page->public = true;
		$this->page->load();

		$this->setTemplateVars( $this->page->getProperties() );
		
		if   ( $this->userIsAdmin() )
		{
			$this->setTemplateVar('template_url',Html::url('main','template',$this->page->templateid));
		}
	
		$template = new Template( $this->page->templateid );
		$template->load();
		$this->setTemplateVar('template_name',$template->name);
	
		$templates = Array();
		foreach( Template::getAll() as $id=>$name )
		{
			if	( $id != $this->page->templateid )
				$templates[$id]=$name;
		}
		$this->setTemplateVar('templates',$templates); 
	}



	

	/**
	 * Seite veroeffentlichen
	 *
	 * Es wird ein Formular angzeigt, mit dem die Seite veroeffentlicht
	 * werden kann 
	 */
	function pubView()
	{
	}



	/**
	 * Seite veroeffentlichen
	 *
	 * Die Seite wird generiert.
	 */
	function pubAction()
	{
		if	( !$this->page->hasRight( ACL_PUBLISH ) )
			Http::notAuthorized( 'no right for publish' );

		$this->page->public = true;
		$this->page->publish();
		$this->page->publish->close();

//		foreach( $this->page->publish->publishedObjects as $o )
//		{
//			$this->addNotice($o['type'],$o['full_filename'],'PUBLISHED','ok');
//		}

		$this->addNotice('page',$this->page->fullFilename,'PUBLISHED'.($this->page->publish->ok?'':'_ERROR'),$this->page->publish->ok,array(),$this->page->publish->log);
	}
	
	
	function setWindowMenu( $type ) {
		switch( $type)
		{
			case 'elements':
				$menu = array( array('subaction'=>'el'  ,'text'=>'all'),
				               array('subaction'=>'form','text'=>'change'    )  );
				$this->setTemplateVar('windowMenu',$menu);
				break;
			case 'acl':
				$menu = array( array('subaction'=>'rights' ,'text'=>'show'),
		                       array('subaction'=>'aclform','text'=>'add' ) );
				$this->setTemplateVar('windowMenu',$menu);
				break;

		}
	}
	
	
		/**
	 * Stellt fest, welche Menüeinträge ggf. ausgeblendet werden.
	 * 
	 * @see actionClasses/Action#checkMenu($name)
	 */
	function checkMenu( $menu ) {

		switch( $menu)
		{
			case 'changetemplate':
				// Template nur austauschbar, wenn es mind. 2 gibt.
				return (!readonly() && count(Template::getAll()) > 1);

			case 'aclform':
				return !readonly();

			case 'form':
				return !readonly();

			default:
				return true;

		}
	}
	
}

?>