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
// ---------------------------------------------------------------------------
// $Log$
// Revision 1.10  2004-10-05 10:00:49  dankert
// Neue Funktionalit?t: Austauschen einer Vorlage
//
// Revision 1.9  2004/09/07 21:12:08  dankert
// Seiten laden bei elsave()
//
// Revision 1.8  2004/05/03 20:22:58  dankert
// move() korrigiert
//
// Revision 1.7  2004/05/02 14:49:37  dankert
// Einf?gen package-name (@package)
//
// Revision 1.6  2004/05/02 12:00:44  dankert
// Initialisieren von $value->publish
//
// Revision 1.5  2004/04/30 21:07:32  dankert
// Auswerten von Schalter $release
//
// Revision 1.4  2004/04/30 20:31:47  dankert
// Berechtigungen anzeigen
//
// Revision 1.3  2004/04/25 19:01:02  dankert
// Speichern von Elementen, die in allen Sprachen gleich sind
//
// Revision 1.2  2004/04/24 16:55:27  dankert
// Korrektur: pub()
//
// Revision 1.1  2004/04/24 15:14:52  dankert
// Initiale Version
//
// ---------------------------------------------------------------------------

/**
 * Action-Klasse zum Bearbeiten einer Seite
 * @author $Author$
 * @version $Revision$
 * @package openrat.actions
 */

class PageAction extends Action
{
	var $page;
	var $defaultSubAction = 'show';


	function PageAction()
	{
		if	( $this->getRequestVar('objectid') != '' )
			$this->page = new Page( $this->getRequestVar('objectid') );
		else	$this->page = new Page( $this->getSessionVar('objectid') );

		$this->page->load();
	}


	/**
	 * Verschieben der Seite
	 */
	function move()
	{
		$this->objectMove();
		$this->page->load();

		$this->callSubAction('prop');
	}


	function addACL()
	{
		$this->objectAddACL();

		$this->callSubAction('rights');
	}


	function delACL()
	{
		$this->objectDelACL();

		$this->callSubAction('rights');
	}


	function elsave()
	{
		$value = new Value();
		$value->languageid = $this->getSessionVar('languageid');
		$value->objectid   = $this->getSessionVar('objectid');
		$value->pageid     = Page::getPageIdFromObjectId( $this->getSessionVar('objectid') );
		$value->element = new Element( $this->getSessionVar('elementid') );
		$value->element->load();
		$value->publish = false;
		$value->load();

		$value->number = $this->getRequestVar('number') * pow(10,$value->element->decimals);

		$value->linkToObjectId = intval($this->getRequestVar('linkobjectid'));
	
		$value->text           = $this->getRequestVar('text');

		if   ( $this->getRequestVar('year') != '' )
		{
			if   ( $this->getRequestVar('ansidate') != $this->getRequestVar('ansidate_orig') )
				$value->date = strtotime($this->getRequestVar('ansidate') );
			else	$value->date = mktime( $this->getRequestVar('hour'),
					                  $this->getRequestVar('minute'),
					                  $this->getRequestVar('second'),
					                  $this->getRequestVar('month'),
					                  $this->getRequestVar('day'),
					                  $this->getRequestVar('year')    );
		}
		else $value->date = 0;
	
		$value->text = $this->getRequestVar('text');

		$value->page = new Page( $value->objectid );
		$value->page->load();
		
		// Ermitteln, ob Inhalt sofort freigegeben werden kann und soll
		if	( $value->page->hasRight('release') && $this->getRequestVar('release')!='' )
			$value->publish = true;
		else	$value->publish = false;

		// Inhalt speichern
		
		// Wenn Inhalt in allen Sprachen gleich ist, dann wird der Inhalt
		// f?r jede Sprache einzeln gespeichert.
		if	( $value->element->allLanguages )
		{
			$p = new Project();
			foreach( $p->getLanguageIds() as $languageid )
			{
				$value->languageid = $languageid;
				$value->save();
			}
		}
		else
		{
			// sonst nur 1x speichern (f?r die aktuelle Sprache)
			$value->save();
		}
	
		$this->callSubAction( $this->getRequestVar('old_pageaction') );
	}


	function propsave()
	{
		if   ($this->getRequestVar('name') != '')
		{
			if   ( $this->getRequestVar('delete') == '1' )
			{
				$this->page->delete();
				$this->forward('');
			}
			else
			{
				$this->page->name        = $this->getRequestVar('name'    );
				$this->page->filename    = $this->getRequestVar('filename');
				$this->page->desc        = $this->getRequestVar('desc'    );

				$this->page->save();
			}
			$this->setTemplateVar('tree_refresh',true);
	
		}
		
		$this->callSubAction('prop');
	}


	function ReplaceTemplateSelectElements()
	{
		$newTemplateId = intval($this->getRequestVar('templateid'));

		if   ( $newTemplateId != 0  )
		{
			$this->setTemplateVar('newTemplateId',$newTemplateId );

			$oldElements = Array();
			$oldTemplate = new Template( $this->page->templateid );
			$newTemplate = new Template( $newTemplateId );
			
			foreach( $oldTemplate->getElementIds() as $elementid )
			{
				$e = new Element( $elementid );
				$e->load();
				
				if	( !$e->isWritable() )
					continue;

				$oldElements[$elementid] = $e->name.' - '.lang('EL_'.$e->type );

				$newElements = Array();
				$newElements[0] = lang('ELEMENT_DELETE_VALUES');
	
				foreach( $newTemplate->getElementIds() as $newelementid )
				{
					$ne = new Element( $newelementid );
					$ne->load();
					
					// Nur neue Elemente anbieten, deren Typ identisch ist
					if	( $ne->type == $e->type )
						$newElements[$newelementid] = lang('ELEMENT').': '.$e->name.' - '.lang('EL_'.$e->type );
				}
				$this->setTemplateVar('newTemplateElementsOf'.$elementid,$newElements );
			}
			$this->setTemplateVar('oldTemplateElements',$oldElements );


			$this->forward('page_replacetemplate');
		}
		else
		{
			$this->callSubAction('prop');
		}
	}


	function replaceTemplate()
	{
		$newTemplateId = intval($this->getRequestVar('newTemplateId'));
		$replaceElementMap = Array();
		
		$oldTemplate = new Template( $this->page->templateid );
		foreach( $oldTemplate->getElementIds() as $elementid )
		{
			$replaceElementMap[$elementid] = $this->getRequestVar('from'.$elementid);
		}
		
		if   ($newTemplateId != 0  )
		{
			print_r( $replaceElementMap );
			$this->page->replaceTemplate( $newTemplateId,$replaceElementMap );
		}

		$this->callSubAction('prop');
	}


	function el()
	{
		global $conf_php;

		$this->page->public = true;
		$this->page->simple = true;
		$this->page->generate_elements();
		
		$list = array();
	
		foreach( $this->page->values as $id=>$value )
		{
			if   ( $value->element->isWritable() )
			{
				$list[$id] = array();
				$list[$id]['name']       = $value->element->name;
				$list[$id]['desc']       = $value->element->desc;
				$list[$id]['type']       = $value->element->type;
	
				$u = new User( $value->lastchangeUserId );
				$u->load();
				$list[$id]['username'    ] = $u->name;
				$list[$id]['userfullname'] = $u->fullname;
				$list[$id]['date'        ] = date( lang('DATE_FORMAT'),$value->lastchangeTimeStamp);
				$list[$id]['archive_url' ] = Html::url(array('action'=>'pageelement','elementid'=>$id,'subaction'=>'archive'));
				$list[$id]['url'         ] = Html::url(array('action'=>'pageelement','elementid'=>$id,'subaction'=>'edit'   ));
				
				// Maximal 50 Stellen des Inhaltes anzeigen
				$list[$id]['value'] = Text::maxLaenge( 50,$value->value );
			}
		}
	
		$this->setTemplateVar('el',$list);
		$this->forward('page_element');

	}


	function show()
	{
		// Seite definieren
		$this->page->load();
		$this->page->generate();
		$this->page->write();
		require( $this->page->tmpfile() );

	}


	function edit()
	{
		// Editier-Icons anzeigen
		$this->page->icons = true;
	
		$this->page->load();
		$this->page->generate();
		$this->page->write();
		require( $this->page->tmpfile() );

	}


	function src()
	{
		$this->page->public = true;
		$this->page->load();
	
		$src = $this->page->generate();
		
		// HTML Highlighting
		$src = preg_replace( '|<(.+)( .+)?>|Us'       , '<strong>&lt;$1</strong>$2<strong>&gt;</strong>', $src);
		$src = preg_replace( '|([a-zA-Z]+)="(.+)"|Us' , '<em>$1</em>=<var>"$2"</var>'                   , $src);
		//$var['src'] = htmlentities($src);
		$this->setTemplateVar('src',$src);
	
		$this->forward('page_src');
	}


	function prop()
	{
		global $SESS;
		$this->setTemplateVar('id',$this->page->objectid);
	
		$this->page->public = true;
		$this->page->load();
		$this->setTemplateVars( $this->page->getProperties() );
		
		$this->setTemplateVar('delete',$this->page->hasRight('delete'));
	
		if   ( $SESS['user']['is_admin'] == '1' )
		{
			$this->setTemplateVar('template_url',Html::url(array('action'=>'main','callAction'=>'template','templateid'=>$this->page->templateid,'tplaction'=>'show')));
		}
	
		$template = new Template( $this->page->templateid );
		$template->load();
		$this->setTemplateVar('template_name',$template->name);
	
		// Alle Ordner ermitteln
		$this->setTemplateVar('act_folderobjectid',$this->page->parentid);

		$folders = array();
		$folder = new Folder( $this->page->parentid );
		
		foreach( $folder->getOtherFolders() as $oid )
		{
			$f = new Folder( $oid );
			$folders[$oid] = implode(' &raquo; ',$f->parentObjectNames(true,true) );
		}
		asort( $folders );
		$this->setTemplateVar('folder',$folders); 

		$templates = Array();
		foreach( Template::getAll() as $id=>$name )
		{
			if	( $id != $this->page->templateid )
				$templates[$id]=$name;
		}
		$this->setTemplateVar('templates',$templates); 
		 
	
		$this->forward('page_prop');
	}


	function pub()
	{
		$this->page->publish();

		$list = array();
		foreach( $this->page->publish->publishedObjects as $o )
		{
			$list[] = $o['filename'];
		}

		$this->setTemplateVar('filenames',$list);

		$this->forward('publish');
	}


	function rights()
	{
		global $SESS;
		global $conf_php;
		if   ($SESS['user']['is_admin'] != '1') die('nice try');

		$acllist = array();	
		foreach( $this->page->getAllInheritedAclIds() as $aclid )
		{
			$acl = new Acl( $aclid );
			$acl->load();
			$key = 'au'.$acl->username.'g'.$acl->groupname.'a'.$aclid;
			$acllist[$key] = $acl->getProperties();
		}

		foreach( $this->page->getAllAclIds() as $aclid )
		{
			$acl = new Acl( $aclid );
			$acl->load();
			$key = 'bu'.$acl->username.'g'.$acl->groupname.'a'.$aclid;
			$acllist[$key] = $acl->getProperties();
			$acllist[$key]['delete_url'] = Html::url(array('subaction'=>'delACL','aclid'=>$aclid));
		}
		ksort( $acllist );

		$this->setTemplateVar('acls',$acllist );

		$this->setTemplateVar('users'    ,User::listAll()   );
		$this->setTemplateVar('groups'   ,Group::getAll()   );

		$languages = Language::getAll();
		$languages[0] = lang('ALL_LANGUAGES');
		$this->setTemplateVar('languages',$languages);

		$this->forward('page_rights');
	}
}

?>