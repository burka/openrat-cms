<?php
// ---------------------------------------------------------------------------
// $Id$
// ---------------------------------------------------------------------------
// OpenRat Content Management System
// Copyright (C) 2002 Jan Dankert, jandankert@jandankert.de
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
// Revision 1.17  2005-01-23 11:13:54  dankert
// Schalter "nologin" beruecksichtigen
//
// Revision 1.16  2005/01/14 21:41:23  dankert
// Aufruf von lastModified() fuer Conditional-GET
//
// Revision 1.15  2005/01/04 21:42:09  dankert
// Uebertragen von MOTD
//
// Revision 1.14  2004/12/29 20:19:55  dankert
// Korrektur
//
// Revision 1.13  2004/12/28 22:58:39  dankert
// Fuellen Variablen logo* fuer Loginmaske
//
// Revision 1.12  2004/12/26 20:20:17  dankert
// Bei Logout entfernen aller Session-Variablen
//
// Revision 1.11  2004/12/26 18:49:58  dankert
// Projektname im Seiten-Titel
//
// Revision 1.10  2004/12/25 22:11:20  dankert
// Logo-Bild ueber Parameter
//
// Revision 1.9  2004/12/19 21:57:02  dankert
// Korrektur bei direktem Objektaufruf in object()
//
// Revision 1.8  2004/12/19 14:54:31  dankert
// language() und model() korrigiert
//
// Revision 1.7  2004/12/18 00:16:26  dankert
// language_read() entfernt
//
// Revision 1.6  2004/12/15 23:23:27  dankert
// div. neue Methoden
//
// Revision 1.5  2004/11/28 18:26:15  dankert
// Anpassen an neue Sprachdatei-Konventionen
//
// Revision 1.4  2004/11/15 21:34:05  dankert
// Korrektur fuer Administrationsmodus
//
// Revision 1.3  2004/11/10 22:36:45  dankert
// Laden von Projektklassen und Lesen/Schreiben von/nach Session
//
// Revision 1.2  2004/05/02 14:49:37  dankert
// Einf?gen package-name (@package)
//
// Revision 1.1  2004/04/24 15:14:52  dankert
// Initiale Version
//
// ---------------------------------------------------------------------------


define('PROJECTID_ADMIN',-1);

/**
 * Action-Klasse fuer die Start-Action
 * @author $Author$
 * @version $Revision$
 * @package openrat.actions
 */

class IndexAction extends Action
{
	var $defaultSubAction = 'show';


	function setDb( $dbid )
	{
		global $conf;

		if	( !isset($conf['databases'][$dbid] ))
			die( 'unknown DB-Id: '.$dbid );

		$db = new DB( $conf['databases'][$dbid] );
		$db->id = $dbid;
		Session::setDatabase( $db );
	}



	function checkForDb()
	{
		global $conf;
		$dbid = $this->getRequestVar('dbid'); 

		if	( $dbid != '' )
			$this->setDb( $dbid );
	}



	function setDefaultDb()
	{
		global $conf;

		if	( !isset($conf['database']['default']) )
			die('default-database not set');

		$dbid = $conf['database']['default'];
		$this->setDb( $dbid );
	}



	function checkLogin( $name,$pw )
	{
		Logger::debug( "login user $name" );
	
		global $conf;
		global $SESS;
	
		unset( $SESS['user'] );	
	
		
		$db = db_connection();
		
		$ip = getenv("REMOTE_ADDR");
	
		$user = new User();
		$user->name = $name;
		
		$ok = $user->checkPassword( $pw );
		
		// Falls Login erfolgreich
		if  ( $ok )
		{
			// Login war erfolgreich!
			$user->load();
			$user->loadProjects();
			//$user->loadRights();
			$user->setCurrent();
			$user->loginDate = time();
			Session::setUser( $user );
			Logger::info( 'login successful' );

			return true;
		}
		else
		{
			Logger::info( "login for user $name failed" );
			$SESS['loginmessage'] = lang('USER_LOGIN_FAILED');

			return false;
		}
	}


	/**
	 * Anzeigen der Loginmaske.
	 *
	 * Es wird nur die Loginmaske angezeigt.
	 * Hier nie "304 not modified" setzen, da sonst keine
	 * Login-Fehlermeldung erscheinen kann
	 */
	function showlogin()
	{
		global $conf;

		foreach( $conf['databases'] as $dbname=>$dbconf )
		{
			$dbids[$dbname] = $dbconf['comment'];
		}

		$this->setTemplateVar( 'dbids',$dbids );
		
		$db = Session::getDatabase();
		if	( is_object($db) )
			$this->setTemplateVar('actdbid',$db->id);
		else
			$this->setTemplateVar('actdbid',$conf['database']['default']);

		$this->setTemplateVar('logo'    ,$conf['login'   ]['logo'    ]);
		$this->setTemplateVar('logo_url',$conf['login'   ]['logo_url']);
		$this->setTemplateVar('motd'    ,$conf['login'   ]['motd'    ]);
		$this->setTemplateVar('readonly',$conf['security']['readonly']);
		$this->setTemplateVar('nologin' ,$conf['login'   ]['nologin' ]);
		$this->setTemplateVar('loginmessage',$this->getSessionVar('loginmessage'));
		$this->setSessionVar('loginmessage','');

		$this->forward('login');
	}

	function showmenu()
	{
		$user     = Session::getUser();
		$projects = $user->projects;

		$this->lastModified( $user->loginDate );

		// Administrator sieht Administrationsbereich
		if   ( $user->isAdmin )
			$projects = array("-1"=>lang('GLOBAL_ADMINISTRATION')) +  $projects;

		// Projekte ermitteln

		$list = array();
		foreach( $projects as $id=>$name )
		{
			$list[$id]         = array();
			$list[$id]['url' ] = Html::url('index','project',$id);
			$list[$id]['name'] = $name;
		}
		$this->setTemplateVar('el',$list);
	
		$this->forward('project_select');
	}

	function login()
	{
		global $conf;

		$this->checkForDb();
		Session::setUser('');
		
		if	( $conf['login']['nologin'] )
			die('login disabled');

		$this->checkLogin( $this->getRequestVar('login_name'    ),
		                   $this->getRequestVar('login_password')  );
		
		$this->callSubAction('show');
	}


	// Benutzer meldet sich ab
	function logout()
	{
//		Session::setUser('');

		// Aus Sicherheitsgruenden die komplette Session deaktvieren
		session_unset();

		$this->callSubAction('show');
	}


	function project()
	{
		$user = Session::getUser();
		if   ( ! is_object($user) )
		{
			$this->callSubAction('show');
		}

		if	( $this->getRequestId() != 0 )
			$project = new Project( $this->getRequestId() );
		else
			$project = new Project( $this->getRequestVar('projectid') );
		
		if	( $project->projectid != PROJECTID_ADMIN )
		{
			$project->load();
	
			Session::setProject( $project );
			
			$language = new Language( $project->getDefaultLanguageId() );
			$language->load();
			Session::setProjectLanguage( $language );
	
			$model = new Model( $project->getDefaultModelId() );
			$model->load();
			Session::setProjectModel( $model );
	
			$object = new Object( $project->getRootObjectId() );
			$object->objectLoadRaw();
			Session::setObject( $object );
	
			$user->loadRights( $project->projectid,$language->languageid );
			Session::setUser( $user );
		}
		else
		{
			Session::setProject( $project );
		}
		
		$this->callSubAction('show');
	}


	function object()
	{
		$user = Session::getUser();
		if   ( ! is_object($user) )
		{
			$this->callSubAction('show');
		}

		$object = new Object( $this->getRequestId() );
		$object->objectLoadRaw();
		Session::setObject( $object );

		$project = new Project( $object->projectid );
		$project->load();
		Session::setProject( $project );
		
		$language = new Language( $project->getDefaultLanguageId() );
		$language->load();
		Session::setProjectLanguage( $language );

		$model = new Model( $project->getDefaultModelId() );
		$model->load();
		Session::setProjectModel( $model );
		
		$user->loadRights( $project->projectid,$language->languageid );
		Session::setUser( $user );
		
		$this->callSubAction('show');
	}


	function language()
	{
		$language = new Language( $this->getRequestId() );
		$language->load();
		Session::setProjectLanguage( $language );

		$project = new Project( $language->projectid );
		$project->load();
		Session::setProject( $project );

		$model = Session::getProjectModel();
		if	( !is_object($model) )
		{
			$model = new Model( $project->getDefaultModelId() );
			$model->load();
			Session::setProjectModel( $model );
		}

		$object = new Object( $project->getRootObjectId() );
		$object->objectLoadRaw();
		Session::setObject( $object );

		$user = Session::getUser();
		$user->loadRights( $project->projectid,$language->languageid );
		Session::setUser( $user );
		$this->callSubAction('show');
	}


	function model()
	{
		$model = new Model( $this->getRequestId() );
		$model->load();
		Session::setProjectModel( $model );

		$project = new Project( $model->projectid );
		$project->load();
		Session::setProject( $project );

		$language = Session::getProjectLanguage();
		if	( !is_object($language) || $language->projectid != $project->projectid )
		{
			$language = new Language( $project->getDefaultLanguageId() );
			$language->load();
			Session::setProjectLanguage( $language );
		}

		$object = new Object( $project->getRootObjectId() );
		$object->objectLoadRaw();
		Session::setObject( $object );

		$user = Session::getUser();
		$user->loadRights( $project->projectid,$language->languageid );
		Session::setUser( $user );
		$this->callSubAction('show');
	}


	function show()
	{
		global $conf;
		global $PHP_AUTH_USER;
		global $PHP_AUTH_PW;

		$user = Session::getUser();
		if   ( ! is_object($user) )
		{
			// Authorization ueber HTTP
			//
			if   ( $conf['auth']['type'] == 'http' )
			{
				$ok = false;
	
			    if	( isset($_SERVER['PHP_AUTH_USER']) )
			    {
			    	$this->setDefaultDb();
					$ok = $this->checkLogin( $_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'] );
			    }
			    
				if	( ! $ok )
				{
					header( 'WWW-Authenticate: Basic realm="OpenRat Content Management System - Login"' );
					header( 'HTTP/1.0 401 Unauthorized' );
					echo 'Authorization Required!';
					exit;
				}
			}
			elseif	( $conf['auth']['type'] == 'form' )
			{
				// Benutzer ist nicht angemeldet
				$this->callSubAction( 'showlogin' ); // Anzeigen der Login-Maske
			}
			else
			{
				die('unknown auth-type: '.$conf['auth']['type'] );
			}
		}

		// Seite �ndert sich nur 1x pro Session
		$this->lastModified( $user->loginDate );

		$projectid  = intval( $this->getRequestVar('projectid' ) );
		$languageid = intval( $this->getRequestVar('languageid') );
		$objectid   = intval( $this->getRequestVar('objectid'  ) );

		$project = Session::getProject();

		if ( $project->projectid == PROJECTID_ADMIN )
		{
			$project->name = lang('GLOBAL_ADMINISTRATION');
			Session::setProject( $project );

			Session::setProjectLanguage( '' );
			Session::setProjectModel   ( '' );
			Session::setObject         ( '' );
		}

		$db      = Session::getDatabase();
		$this->setTemplateVar( 'title',$user->name.'@'.$project->name.' ('.$db->conf['comment'].') - '.OR_TITLE.' '.OR_VERSION );

		$object  = Session::getObject();

		if	( is_object($object) )
		{
			$this->setTemplateVar( 'frame_src_main',Html::url('main',$object->getType(),$object->objectid) );
		}
		elseif	( is_object($project) && $project->projectid == PROJECTID_ADMIN )
		{
			$this->setTemplateVar( 'frame_src_main',Html::url('main','project') );
		}
		else
		{
			$this->callSubAction( 'showmenu' );
		}
		
		$this->setTemplateVar( 'frame_src_title'   ,Html::url( 'title'          ) );
		$this->setTemplateVar( 'frame_src_treemenu',Html::url( 'treemenu'       ) );
		$this->setTemplateVar( 'frame_src_tree'    ,Html::url( 'tree'    ,'load') );

		$this->setTemplateVar( 'tree_width',$conf['interface']['tree_width'] );
		
		$this->forward( 'frameset' );
	}
}

?>