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


class User
{
	var $userid   = 0;
	var $error    = '';

	var $name     = '';
	var $fullname = '';
	var $ldap_dn;
	var $tel;
	var $mail;
	var $desc;
	var $style;
	var $isAdmin;


	// Konstruktor
	function User( $userid='' )
	{
		if   ( is_numeric($userid) )
			$this->userid = $userid;
	}


	// Lesen Benutzer aus der Datenbank
	function listAll()
	{
		global $conf;
		$db = db_connection();

		$sql = new Sql( 'SELECT id,name FROM {t_user}' );

		return $db->getAssoc( $sql->query );
	}


	function setCurrent()
	{
		global $SESS;

		$SESS['user'] = array();
		$SESS['user']['id']       = $this->userid;
		$SESS['user']['name']     = $this->name;
		$SESS['user']['fullname'] = $this->fullname;
		$SESS['user']['mail']     = $this->mail;
		$SESS['user']['is_admin'] = $this->isAdmin;
		$SESS['user']['style']    = $this->style;
	}


	// Lesen Benutzer aus der Datenbank
	function load()
	{
		global $conf;
		$db = db_connection();

		$sql = new Sql( 'SELECT * FROM {t_user}'.
		                ' WHERE id={userid}' );
		$sql->setInt( 'userid',$this->userid );
		$row = $db->getRow( $sql->query );
		
		if	( count($row) > 1 )
		{
			$this->name     = $row['name'    ];
			$this->style    = $row['style'   ];
			$this->isAdmin  = $row['is_admin'];
			$this->ldap_dn  = $row['ldap_dn' ];
			$this->fullname = $row['fullname'];
			$this->tel      = $row['tel'     ];
			$this->mail     = $row['mail'    ];
			$this->desc     = $row['desc'    ];
			
			if	( $this->fullname == '' )
				$this->fullname = $this->name;
				
			if	( $this->style == '' )
				$this->style = 'default';
		}
		else
		{
			$this->name     = lang('UNKNOWN');
			$this->style    = 'default';
			$this->isAdmin  = false;
			$this->ldap_dn  = '';
			$this->fullname = lang('UNKNOWN');
			$this->tel      = '';
			$this->mail     = '';
			$this->desc     = '';
		}

		/* vorerst unbenutzt:
		if	( $row['use_ldap'] == '1' )
		{
			// Daten aus LDAP-Verzeichnisdienst lesen

			// Verbindung zum LDAP-Server herstellen
			$ldap_conn = @ldap_connect( $conf['ldap']['host'],$conf['ldap']['port'] );
			
			if	( !$ldap_conn )
			{
				logger( 'INFO','cannot connect to LDAP server '.$conf['ldap']['host'].' '.$conf['ldap']['port'] );
				$this->error = 'cannot connect to LDAP server';
				return false;
			}
			
			// Anonymes LDAP-Login versuchen
			$ldap_bind = @ldap_bind( $ldap_conn );
			
			if   ( $ldap_bind )
			{
				// Login erfolgreich
				$sr = ldap_read( $ldap_conn,$row['ldap_dn'],'(objectclass=*)' );
				
				$daten   = ldap_get_entries( $ldap_conn,$sr );
				
				$this->fullname = $daten[0]['givenName'][0].' '.$daten[0]['sn'][0];
				$this->tel      = $daten[0]['telephoneNumber'][0];
				$this->mail     = $daten[0]['mail'][0];
				$this->desc     = $daten[0]['description'][0];
			}
			
		}
		*/
	}



	// Lesen Benutzername
	function getUserName( $userid )
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT name FROM {t_user}'.
		                ' WHERE id={userid}' );
		$sql->setInt( 'userid',$userid );

		$name = $db->getOne( $sql->query );
		
		if	( $name == '' )
			return lang('UNKNOWN');
		else return $name;
	}


	// Speichern Benutzer in der Datenbank
	function save()
	{
		$db = db_connection();

		$sql = new Sql( 'UPDATE {t_user}'.
		                ' SET name={name},'.
		                '     fullname={fullname},'.
		                '     ldap_dn ={ldap_dn} ,'.
		                '     tel     ={tel}     ,'.
		                '     `desc`    ={desc}    ,'.
		                '     mail    ={mail}    ,'.
		                '     style   ={style}   ,'.
		                '     is_admin={isAdmin} '.
		                ' WHERE id={userid}' );
		$sql->setInt   ( 'userid'  ,$this->userid  );
		$sql->setString( 'fullname',$this->fullname);
		$sql->setString( 'name'    ,$this->name    );
		$sql->setString( 'ldap_dn' ,$this->ldap_dn );
		$sql->setString( 'tel'     ,$this->tel     );
		$sql->setString( 'desc'    ,$this->desc    );
		$sql->setString( 'mail'    ,$this->mail    );
		$sql->setString( 'url'     ,$this->url     );
		$sql->setString( 'style'   ,$this->style   );
		$sql->setString( 'isAdmin' ,$this->isAdmin );
		// Datenbankabfrage ausfuehren
		$db->query( $sql->query );
	}


	// Benutzer hinzufuegen
	function add( $name = '' )
	{
		if	( $name != '' )
			$this->name = $name;

		$db = db_connection();

		$sql = new Sql('INSERT INTO {t_user}'.
		               ' (name)'.
		               ' VALUES( {name} )' );
		$sql->setString('name',$this->name);

		// Datenbankbefehl ausfuehren
		$db->query( $sql->query );
	}


	// Benutzer entfernen
	function delete()
	{
		// Alle Archivdaten in Dateien mit diesem Benutzer entfernen
		$sql = new Sql( 'UPDATE {t_object} '.
		                'SET create_userid=null '.
		                'WHERE create_userid={userid}' );
		$sql->setInt   ('userid',$this->userid );
		$db->query( $sql->query );

		// Alle Berechtigungen dieses Benutzers l�schen
		$sql = new Sql( 'DELETE FROM {t_acl} '.
		                'WHERE userid={userid}' );
		$sql->setInt   ('userid',$this->userid );
		$db->query( $sql->query );

		// Alle Gruppenzugeh�rigkeiten dieses Benutzers l�schen
		$sql = new Sql( 'DELETE FROM {t_usergroup} '.
		                'WHERE userid={userid}' );
		$sql->setInt   ('userid',$this->userid );
		$db->query( $sql->query );

		// Benutzer l�schen
		$sql = new Sql( 'DELETE FROM {t_user} '.
		                'WHERE id={userid}' );
		$sql->setInt   ('userid',$this->userid );
		$db->query( $sql->query );
	}


	// Ueberpruefen des Kennwortes
	// entweder ueber Datenbank oder ueber LDAP-Verzeichnisdienst
	function checkPassword( $password )
	{
		global $conf;
		$this->error = '';

		$db = db_connection();

		// Lesen des Benutzers aus der DB-Tabelle
		$sql = new Sql( 'SELECT * FROM {t_user} WHERE name={name}' );
		$sql->setString('name',$this->name);
	
		$res_user = $db->query( $sql->query );
		
		if	( $res_user->numRows() == 1 )
		{
			$row_user = $res_user->fetchRow();
			$this->userid = $row_user['id'];

			// Falls LDAP-dn vorhanden wird Benutzer per LDAP authentifiziert
			if   ( $row_user['ldap_dn'] != '' )
			{
				// Verbindung zum LDAP-Server herstellen
				$ldap_conn = @ldap_connect( $conf['ldap']['host'],$conf['ldap']['port'] );
				
				if	( !$ldap_conn )
				{
					logger( 'INFO','cannot connect to LDAP server '.$conf['ldap']['host'].' '.$conf['ldap']['port'] );
					$this->error = 'cannot connect to LDAP server';
					return false;
				}

				// LDAP-Login versuchen
				if   ( @ldap_bind( $ldap_conn,$row_user['ldap_dn'],$password) )
				{
					// Login erfolgreich
					$SESS['user'] = $row_user;
					return true;
				}
			}
			else
			{
//				echo "aha";
//				echo  $row_user['password'].':'.$password':'.md5( $password );
				// Pr�fen ob Kennwort mit Datenbank �bereinstimmt
				if   ( $row_user['password'] == md5( $password ) )
				{
					// Login erfolgreich
					return true;
				}
			}
		}

		// Benutzername nicht in Datenbank oder Kennwort falsch
		return false;
	}
	
	
	// Neues Kennwort fuer diesen Benutzer setzen
	function setPassword( $password )
	{
		$db = db_connection();

		$sql = new Sql( 'UPDATE {t_user} SET password={password}'.
		                'WHERE id={userid}' );
		$sql->setString('password',md5($password) );
		$sql->setInt   ('userid'  ,$this->userid  );

		$db->query( $sql->query );
	}


	// Gruppen ermitteln, in denen der Benutzer Mitglied ist
	function getGroups()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT {t_group}.id,{t_group}.name FROM {t_group} '.
		                'LEFT JOIN {t_usergroup} ON {t_usergroup}.groupid={t_group}.id '.
		                'WHERE {t_usergroup}.userid={userid}' );
		$sql->setInt('userid',$this->userid );

		return $db->getAssoc( $sql->query );
	}
	

	// Gruppen ermitteln, in denen der Benutzer *nicht* Mitglied ist
	function getOtherGroups()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT {t_group}.id,{t_group}.name FROM {t_group}'.
		                '   LEFT JOIN {t_usergroup} ON {t_usergroup}.groupid={t_group}.id AND {t_usergroup}.userid={userid}'.
		                '   WHERE {t_usergroup}.userid IS NULL' );
		$sql->setInt('userid'  ,$this->userid );

		return $db->getAssoc( $sql->query );
	}


	// Benutzer einer Gruppe hinzufuegen
	function addGroup( $groupid )
	{
		$db = db_connection();

		$sql = new Sql( 'INSERT INTO {t_usergroup} '.
		                '       (userid,groupid) '.
		                '       VALUES( {userid},{groupid} )' );
		$sql->setInt   ('userid'  ,$this->userid );
		$sql->setInt   ('groupid' ,$groupid      );

		$db->query( $sql->query );
	
	}


	// Benutzer aus Gruppe entfernen
	function delGroup( $groupid )
	{
		$db = db_connection();

		$sql = new Sql( 'DELETE FROM {t_usergroup} '.
		                '  WHERE userid={userid} AND groupid={groupid}' );
		$sql->setInt   ('userid'  ,$this->userid );
		$sql->setInt   ('groupid' ,$groupid      );

		$db->query( $sql->query );
	}
	

	// Alle Berechtigungen ermitteln
	function getRights()
	{
		global $SESS,$conf_php;
		$db = db_connection();
		$var = array();

		// Alle Projekte lesen
		$sql = new Sql( 'SELECT id,name FROM {t_project}' );
		$projects = $db->getAssoc( $sql->query );	

		foreach( $projects as $projectid=>$projectname )
		{
			$var[$projectid] = array();
			$var[$projectid]['name'] = $projectname;
			$var[$projectid]['folders'] = array();
			$var[$projectid]['rights'] = array();

			$sql = new Sql( 'SELECT {t_acl}.* FROM {t_acl}'.
			                '  LEFT JOIN {t_folder} ON {t_acl}.folderid = {t_folder}.id'.
			                '  WHERE {t_folder}.projectid={projectid}'.
			                '    AND {t_acl}.userid={userid}' );
			$sql->setInt('projectid',$projectid    );
			$sql->setInt('userid'   ,$this->userid );
			
			$acls = $db->getAll( $sql->query );

			foreach( $acls as $acl )
			{
				$aclid = $acl['id'];
				$folder = new Folder( $acl['folderid'] );
				$folder->load();
				$var[$projectid]['rights'][$aclid] = $acl;
				$var[$projectid]['rights'][$aclid]['foldername'] = implode(' &raquo; ',$folder->parentfolder( false,true ));
				$var[$projectid]['rights'][$aclid]['delete_url'] = 'user.'.$conf_php.'?useraction=delright&aclid='.$aclid;
			}
			
			$sql = new Sql( 'SELECT id FROM {t_folder}'.
			                '  WHERE projectid={projectid}' );
			$sql->setInt('projectid',$projectid);
			$folders = $db->getCol( $sql->query );

			$var[$projectid]['folders'] = array();

			foreach( $folders as $folderid )
			{
				$folder = new Folder( $folderid );
				$folder->load();
				$var[$projectid]['folders'][$folderid] = implode(' &raquo; ',$folder->parentfolder( false,true ));
			}

			asort( $var[$projectid]['folders'] );
		}
		
		return $var;
	}


	// Berechtigung dem Benutzer hinzufuegen
	function addRight( $data )
	{
		global $REQ,$SESS;
		$db = db_connection();
		
		$sql = new SQL('INSERT INTO {t_acl} '.
		               '(userid,groupid,folderid,`read`,`write`,`create`,`delete`,publish) '.
		               'VALUES({userid},{groupid},{folderid},{read},{write},{create},{delete},{publish})');
		               
		$sql->setInt ('userid',$this->userid);
		$sql->setNull('groupid');
		$sql->setInt ('projectid',$SESS['projectid']);
		$sql->setInt ('folderid',$data['folderid']);

		$sql->setInt ('read'   ,$data['read'   ]);
		$sql->setInt ('write'  ,$data['write'  ]);
		$sql->setInt ('create' ,$data['create' ]);
		$sql->setInt ('delete' ,$data['delete' ]);
		$sql->setInt ('publish',$data['publish']);
	
		// Datenbankabfrage ausf�hren
		$db->query( $sql->query );
	}
	
	
	// Berechtigung entfernen
	function delRight( $aclid )
	{
		$db = db_connection();

		$sql = new SQL('DELETE FROM {t_acl} WHERE id={aclid}');
		$sql->setInt( 'aclid',$aclid );
	
		// Datenbankabfrage ausf�hren
		$db->query( $sql->query );
	}
}

?>