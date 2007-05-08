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
// Revision 1.5  2007-05-08 19:21:58  dankert
// Erweiterung der Suche um die Schnellsuche.
//
// Revision 1.4  2004/12/20 20:27:13  dankert
// Aktuelle Userid setzen
//
// Revision 1.3  2004/11/28 23:55:49  dankert
// Ausgabe performanter
//
// Revision 1.2  2004/05/02 14:49:37  dankert
// Einf?gen package-name (@package)
//
// Revision 1.1  2004/04/24 15:14:52  dankert
// Initiale Version
//
// ---------------------------------------------------------------------------

/**
 * Action-Klasse fuer die Suchfunktion
 * @author $Author$
 * @version $Revision$
 * @package openrat.actions
 */

class SearchAction extends Action
{
	/**
	 * Falls keine Unteraktion ausgew?hlt wurde wird diese genommen
	 * @type String
	 */
	var $defaultSubAction = 'prop';


	/**
	 * leerer Kontruktor
	 */
	function SearchAction()
	{
	}


	/**
	 * Durchf?hren der Suche
	 * und Anzeige der Ergebnisse
	 */
	function searchcontent()
	{
		global $conf_php;

		$listObjectIds   = array();
		$listTemplateIds = array();
		
		switch( $this->getRequestVar('type') )
		{
			case 'value':
				$e = new Value();
				$listObjectIds = $e->getObjectIdsByValue( $this->getRequestVar('text') );

				$template = new Template();
				$listTemplateIds = $template->getTemplateIdsByValue( $this->getRequestVar('text') );
				break;

			case 'lastchange_user':
				$e = new Value();
				$listObjectIds = $e->getObjectIdsByLastChangeUserId( $this->getRequestVar('lastchange_userid') );
				break;
		}


		$this->explainResult( $listObjectIds, $listTemplateIds );

	}
	
	
	
	/**
	 * 
	 */
	function explainResult( $listObjectIds, $listTemplateIds )
	{
		$resultList = array();

		foreach( $listObjectIds as $objectid )
		{
			$o = new Object( $objectid );
			$o->load();
			$resultList[$objectid] = array();
			$resultList[$objectid]['url']  = Html::url('main',$o->getType(),$objectid);
			$resultList[$objectid]['type'] = $o->getType();
			$resultList[$objectid]['name'] = $o->name;

			if	( $o->desc != '' )
				$resultList[$objectid]['desc'] = $o->desc;
			else
				$resultList[$objectid]['desc'] = lang('GLOBAL_NO_DESCRIPTION_AVAILABLE');
		}

		foreach( $listTemplateIds as $templateid )
		{
			$t = new Template( $templateid );
			$t->load();
			$resultList['t'.$templateid] = array();
			$resultList['t'.$templateid]['url' ]  = Html::url('main','template',$templateid);
			$resultList['t'.$templateid]['type'] = 'template';
			$resultList['t'.$templateid]['name'] = $t->name;
			$resultList['t'.$templateid]['desc'] = lang('GLOBAL_NO_DESCRIPTION_AVAILABLE');
		}

		$this->setTemplateVar( 'result',$resultList );
	}
	
	
	/**
	 * Durchf?hren der Suche
	 * und Anzeige der Ergebnisse
	 */
	function searchprop()
	{
		global $conf_php;

		$listObjectIds   = array();
		$listTemplateIds = array();
		
			switch( $this->getRequestVar('type') )
			{
				case 'id':
					$o = new Object();
					if	( $o->isObjectId($this->getRequestVar('text')) )
						$listObjectIds[] = $this->getRequestVar('text');
					break;

				case 'filename':
					$o = new Object();
					$listObjectIds = $o->getObjectIdsByFilename( $this->getRequestVar('text') );

					$f = new File();
					$listObjectIds += $f->getObjectIdsByExtension( $this->getRequestVar('text') );
					break;

				case 'name':
					$o = new Object();
					$listObjectIds = $o->getObjectIdsByName( $this->getRequestVar('text') );
					break;

				case 'description':
					$o = new Object();
					$listObjectIds = $o->getObjectIdsByDescription( $this->getRequestVar('text') );
					break;

				case 'create_user':
					$o = new Object();
					$listObjectIds = $o->getObjectIdsByCreateUserId( $this->getRequestVar('userid') );
					break;

				case 'lastchange_user':
					$o = new Object();
					$listObjectIds = $o->getObjectIdsByLastChangeUserId( $this->getRequestVar('userid') );
					break;

				default:
					die('search method unknown: '.$this->getRequestVar('type') );
			}

		$this->explainResult( $listObjectIds, $listTemplateIds );
	}
	
	
	/**
	 * Durchf?hren der Suche
	 * und Anzeige der Ergebnisse
	 */
	function quicksearch()
	{
		global $conf;

		$listObjectIds   = array();
		$listTemplateIds = array();
		
		$text = $this->getRequestVar('search');
		
		$o = new Object();
		if	( $o->isObjectId($this->getRequestVar( $text )) )
			$listObjectIds[] = $this->getRequestVar( $text );
			
		if	( $conf['search']['quicksearch']['search_name'] )
		{
			$o = new Object();
			$listObjectIds += $o->getObjectIdsByName( $text );
		}

		if	( $conf['search']['quicksearch']['search_description'] )
		{
			$o = new Object();
			$listObjectIds += $o->getObjectIdsByDescription( $text );
		}

		if	( $conf['search']['quicksearch']['search_filename'] )
		{
			$o = new Object();
			$listObjectIds += $o->getObjectIdsByFilename( $text );
	
			$f = new File();
			$listObjectIds += $f->getObjectIdsByExtension( $text );
		}
		
		// Inhalte durchsuchen
		if	( $conf['search']['quicksearch']['search_content'] )
		{
			$e = new Value();
			$listObjectIds += $e->getObjectIdsByValue( $text );
	
			$template = new Template();
			$listTemplateIds += $template->getTemplateIdsByValue( $text );
		}

		$this->explainResult( $listObjectIds, $listTemplateIds );
	}
	
	
	function prop()
	{
		$user = Session::getUser();
		$this->setTemplateVar( 'users'     ,User::listAll() );
		$this->setTemplateVar( 'act_userid',$user->userid   );
	}


	function content()
	{
		$user = Session::getUser();
		$this->setTemplateVar( 'users'     ,User::listAll() );
		$this->setTemplateVar( 'act_userid',$user->userid   );
	}
	
	function result()
	{
	}
}

?>