<?php

namespace cms\model;

use database\Database;
use Session;


/**
 * Darstellen eines Projektes
 *
 * @author Jan Dankert
 * @package openrat.objects
 */
class Project
{
	// Eigenschaften
	var $projectid;
	var $name;
	var $target_dir;
	var $ftp_url;
	var $ftp_passive;
	var $cmd_after_publish;
	var $content_negotiation;
	var $cut_index;
	
	var $log = array();
	
	
	// Konstruktor
	public function  __construct( $projectid='' )
	{
		if   ( intval($projectid) != 0 )
			$this->projectid = $projectid;
	}

	
	/**
	 * Stellt fest, ob die angegebene Projekt-Id existiert.
     * @param $id int Projekt-Id
     * @return boolean
     *
	 */
	public function isAvailable($id )
	{
		$db = db_connection();

		$sql = $db->sql('SELECT 1 FROM {{project}} '.
		               ' WHERE id={id}');
		$sql->setInt('id' ,$id  );

		return intval($sql->getOne()) == 1;
	}
	

    /**
     * Liefert alle verf?gbaren Projekte.
     * @return array
     */
    public function getAllProjects()
	{
		$db = db_connection();
		$sql = $db->sql( 'SELECT id,name FROM {{project}} '.
		                '   ORDER BY name' );

		return $sql->getAssoc();
	}


    // Liefert alle verf?gbaren Projekt-Ids
    public function getAllProjectIds()
	{
		$db = db_connection();
		$sql = $db->sql( 'SELECT id FROM {{project}} '.
		                '   ORDER BY name' );

		return $sql->getCol();
	}


	public function getLanguages()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT id,name FROM {{language}}'.
		                '  WHERE projectid={projectid} '.
		                '  ORDER BY name' );
		$sql->setInt   ('projectid',$this->projectid);

		return $sql->getAssoc();
	}


	public function getLanguageIds()
	{
		return array_keys( $this->getLanguages() );
	}


	public function getModels()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT id,name FROM {{projectmodel}}'.
		                '  WHERE projectid= {projectid} '.
		                '  ORDER BY name' );
		$sql->setInt   ('projectid',$this->projectid);

		return $sql->getAssoc();
	}


	public function getModelIds()
	{
		return array_keys( $this->getModels() );
	}


    public function  getTemplateIds()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT id FROM {{template}}'.
		                '  WHERE projectid= {projectid} ' );
		$sql->setInt   ('projectid',$this->projectid);

		return $sql->getCol();
	}


    public function  getTemplates()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT id,name FROM {{template}}'.
		                '  WHERE projectid= {projectid} ' );
		$sql->setInt   ('projectid',$this->projectid);

		return $sql->getAssoc();
	}


	/**
	 * Ermitteln des Wurzel-Ordners fuer dieses Projekt.
	 * 
	 * Der Wurzelordner ist der einzige Ordnerhat in diesem
	 * Projekt, der kein Elternelement besitzt.
	 * 
	 * @return Objekt-Id des Wurzelordners
	 */
    public function  getRootObjectId()
	{
		$db = db_connection();
		
		$sql = $db->sql('SELECT id FROM {{object}}'.
		               '  WHERE parentid IS NULL'.
		               '    AND projectid={projectid}' );

		$sql->setInt('projectid',$this->projectid);
		
		return( $sql->getOne() );
	}

	

	// Laden

    /**
     * @throws \ObjectNotFoundException
     */
    public function  load()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT * FROM {{project}} '.
		                '   WHERE id={projectid}' );
		$sql->setInt( 'projectid',$this->projectid );

		$row = $sql->getRow();

		if	( empty($row) )
			throw new \ObjectNotFoundException('project '.$this->projectid.' not found');
			
		$this->name                = $row['name'               ];
		$this->target_dir          = $row['target_dir'         ];
		$this->ftp_url             = $row['ftp_url'            ];
		$this->ftp_passive         = $row['ftp_passive'        ];
		$this->cmd_after_publish   = $row['cmd_after_publish'  ];
		$this->content_negotiation = $row['content_negotiation'];
		$this->cut_index           = $row['cut_index'          ];
	}


	// Laden
	public function loadByName()
	{
		$db = db_connection();

		$sql = $db->sql( 'SELECT * FROM {{project}} '.
		                '   WHERE name={projectname}' );
		$sql->setString( 'projectname',$this->name );

		$row = $sql->getRow();

		$this->projectid           = $row['id'                 ];
		$this->target_dir          = $row['target_dir'         ];
		$this->ftp_url             = $row['ftp_url'            ];
		$this->ftp_passive         = $row['ftp_passive'        ];
		$this->cmd_after_publish   = $row['cmd_after_publish'  ];
		$this->content_negotiation = $row['content_negotiation'];
		$this->cut_index           = $row['cut_index'          ];
	}


	// Speichern
	public function save()
	{
		$db = db_connection();

		$sql = $db->sql( <<<SQL
				UPDATE {{project}}
                  SET name                = {name},
                      target_dir          = {target_dir},
                      ftp_url             = {ftp_url}, 
                      ftp_passive         = {ftp_passive}, 
                      cut_index           = {cut_index}, 
                      content_negotiation = {content_negotiation}, 
                      cmd_after_publish   = {cmd_after_publish} 
                WHERE id= {projectid}
SQL
);

		$sql->setString('ftp_url'            ,$this->ftp_url );
		$sql->setString('name'               ,$this->name );
		$sql->setString('target_dir'         ,$this->target_dir );
		$sql->setInt   ('ftp_passive'        ,$this->ftp_passive );
		$sql->setString('cmd_after_publish'  ,$this->cmd_after_publish );
		$sql->setInt   ('content_negotiation',$this->content_negotiation );
		$sql->setInt   ('cut_index'          ,$this->cut_index );
		$sql->setInt   ('projectid'          ,$this->projectid );

		$sql->query();

		try
		{
			$rootFolder = new Folder( $this->getRootObjectId() );
			$rootFolder->load();
			$rootFolder->filename = $this->name;
			$rootFolder->save();
		}
		catch( \Exception $e )
		{
			\Logger::warn('Project '.$this->projectid.' has not a root folder'."\n".$e->getTraceAsString());
		}
	}


	// Speichern
	public function getProperties()
	{
		return Array( 'name'               =>$this->name,
		              'target_dir'         =>$this->target_dir,
		              'ftp_url'            =>$this->ftp_url,
		              'ftp_passive'        =>$this->ftp_passive,
		              'cmd_after_publish'  =>$this->cmd_after_publish,
		              'content_negotiation'=>$this->content_negotiation,
		              'cut_index'          =>$this->cut_index,
		              'projectid'          =>$this->projectid );
	}


	// Projekt hinzufuegen
	public function add()
	{
		$db = db_connection();
		
		$sql = $db->sql('SELECT MAX(id) FROM {{project}}');
		$this->projectid = intval($sql->getOne())+1;


		// Projekt hinzuf?gen
		$sql = $db->sql( 'INSERT INTO {{project}} (id,name,target_dir,ftp_url,ftp_passive,cmd_after_publish,content_negotiation,cut_index) '.
		                "  VALUES( {projectid},{name},'','',0,'',0,0 ) " );
		$sql->setInt   ('projectid',$this->projectid );
		$sql->setString('name'     ,$this->name      );

		$sql->query();

		// Modell anlegen
		$model = new Model();
		$model->projectid = $this->projectid;
		$model->name = 'html';
		$model->add();
		
		// Sprache anlegen
		$language = new Language();
		$language->projectid = $this->projectid;
		$language->isoCode = 'en';
		$language->name    = 'english';
		$language->add();
		
		// Haupt-Ordner anlegen
		$folder = new Folder();
		$folder->isRoot     = true;
		$folder->projectid  = $this->projectid;
		$folder->languageid = $language->languageid;
		$folder->filename   = $this->name;
		$folder->name       = $this->name;
		$folder->isRoot     = true;
		$folder->add();

		// Template anlegen
		$template = new Template();
		$template->projectid  = $this->projectid;
		$template->name       = '';
		$template->modelid    = $model->modelid;
		$template->languageid = $language->languageid;
		$template->extension  = 'html';
		$template->src        = '<html><body><h1>Hello world</h1><hr><p>Hello, World.</p></body></html>';
		$template->add();
		$template->save();

		// Beispiel-Seite anlegen
		$page = new Page();
		$page->parentid   = $folder->objectid;
		$page->projectid  = $this->projectid;
		$page->languageid = $language->languageid;
		$page->templateid = $template->templateid;
		$page->filename   = '';
		$page->name       = 'OpenRat';
		$page->add();
	}


	// Projekt aus Datenbank entfernen
	public function delete()
	{
		$db = db_connection();

		// Root-Ordner rekursiv samt Inhalten loeschen
		$folder = new Folder( $this->getRootObjectId() );
		$folder->deleteAll();


		foreach( $this->getLanguageIds() as $languageid )
		{
			$language = new Language( $languageid );
			$language->delete();
		}
		

		foreach( $this->getTemplateIds() as $templateid )
		{
			$template = new Template( $templateid );
			$template->delete();
		}
		

		foreach( $this->getModelIds() as $modelid )
		{
			$model = new Model( $modelid );
			$model->delete();
		}
		

		// Projekt l?schen
		$sql = $db->sql( 'DELETE FROM {{project}}'.
		                '  WHERE id= {projectid} ' );
		$sql->setInt( 'projectid',$this->projectid );
		$sql->query();
	}
	
	public function getDefaultLanguageId()
	{
		$db = Session::getDatabase();

		// ORDER BY deswegen, damit immer mind. eine Sprache
		// gelesen wird
		$sql = $db->sql( 'SELECT id FROM {{language}} '.
		                '  WHERE projectid={projectid}'.
		                '   ORDER BY is_default DESC' );

		$sql->setInt('projectid',$this->projectid );
		
		return $sql->getOne();
	}


	public function getDefaultModelId()
	{
		$db = Session::getDatabase();

		// ORDER BY deswegen, damit immer mind. eine Sprache
		// gelesen wird
		$sql = $db->sql( 'SELECT id FROM {{projectmodel}} '.
		                '  WHERE projectid={projectid}'.
		                '   ORDER BY is_default DESC' );
		$sql->setInt('projectid',$this->projectid );
		
		return $sql->getOne();
	}

	
	
	/**
	 * Entfernt nicht mehr notwendige Inhalte aus dem Archiv.
	 */
	public function checkLimit()
	{
		$root = new Folder( $this->getRootObjectId() );
		$root->projectid = $this->projectid;
		
		$pages = $root->getAllObjectIds( array('page') );
		$languages = $this->getLanguageIds();
		
		foreach( $pages as $objectid )
		{
			$page = new Page( $objectid );
			$page->load();
			foreach( $page->getElementIds() as $eid )
			{
				foreach( $languages as $lid )
				{
					$value = new Value();
					$value->element    = new Element($eid);
					$value->pageid     = $page->pageid;
					$value->languageid = $lid;
					
					$value->checkLimit();
				}
			}
		}
		
	}

	

	/**
	 * Testet die Integrität der Datenbank.
	 */
	public function checkLostFiles()
	{
		$this->log = array();
		
		$db = &Session::getDatabase();

		// Ordnerstruktur prüfen.
		$sql = $db->sql( <<<EOF
SELECT thistab.id FROM {{object}} AS thistab
 LEFT JOIN {{object}} AS parenttab
        ON parenttab.id = thistab.parentid
  WHERE thistab.projectid={projectid} AND thistab.parentid IS NOT NULL AND parenttab.id IS NULL
EOF
);
		$sql->setInt('projectid',$this->projectid);

		$idList = $sql->getCol();
		
		if	( count( $idList ) > 0 )
		{
			$lostAndFoundFolder = new Folder();
			$lostAndFoundFolder->projectid = $this->projectid;
			$lostAndFoundFolder->languageid = $this->getDefaultLanguageId();
			$lostAndFoundFolder->filename = "lostandfound";
			$lostAndFoundFolder->name     = 'Lost+found';
			$lostAndFoundFolder->parentid = $this->getRootObjectId();
			$lostAndFoundFolder->add();
			
			foreach( $idList as $id )
			{
				$this->log[] = 'Lost file! Moving '.$id.' to lost+found.';
				$obj = new Object( $id );
				$obj->setParentId( $lostAndFoundFolder->objectid );
			}
		}

		
		// Prüfe, ob die Verbindung Projekt->Template->Templatemodell->Projectmodell->Projekt konsistent ist. 
		$sql = $db->sql( <<<EOF
SELECT DISTINCT projectid FROM {{projectmodel}} WHERE id IN (SELECT projectmodelid from {{templatemodel}} WHERE templateid in (SELECT id from {{template}} WHERE projectid={projectid}))
EOF
);
		$sql->setInt('projectid',$this->projectid);

		$idList = $sql->getCol();
		
		if	( count( $idList ) > 1 )
		{
			\Logger::warn('Inconsistence found: Reference circle project<->template<->templatemodel<->projectmodel<->project is not consistent.');
			$this->log[] = 'Inconsistence found: Reference circle project<->template<->templatemodel<->projectmodel<->project is not consistent.';
		}

	}
	
	
	/**
	 * Synchronisation des Projektinhaltes mit dem Dateisystem.
	 */
	public function  sync()
	{
		global $conf;
		$syncConf = $conf['sync'];
		
		if	( ! $syncConf['enabled'] )
			return;
		
		$syncDir = slashify($syncConf['directory']).$this->name;
		
	}

    /**
     * Kopiert ein Projekt von einer Datenbank zu einer anderen.<br>
     * <br>
     * Alle Projektinhalte werden kopiert, die Fremdschluesselbeziehungen werden entsprechend angepasst.<br>
     * <br>
     * Alle Beziehungen zu Benutzern, z.B. "Zuletzt geaendert von", "angelegt von" sowie<br>
     * alle Berechtigungsinformationen gehen verloren!<br>
     *
     * @param string $dbid_destination ID der Ziel-Datenbank
     * @param string $name
     */
	public function copy( $dbid_destination,$name='' )
	{
		\Logger::debug( 'Copying project '.$this->name.' to database '.$dbid_destination );
		
		global $conf;
		$zeit = date('Y-m-d\TH:i:sO');
		
		$db_src  = db_connection();
		$db_dest = new Database( $conf['database'][$dbid_destination] );
		$db_dest->id = $dbid_destination;
		$db_dest->start();
		
		$sameDB = ( $db_dest->id == $db_src->id );
		
		// -------------------------------------------------------
		$mapping = array();
		$ids = array('project'      => array('foreign_keys'=>array(),
		                                     'primary_key' =>'id',
		                                     'unique_idx'  =>'name',
		                                     'erase'       =>array()
		                                    ),
		             'language'     => array('foreign_keys'=>array('projectid'=>'project'),
		                                     'primary_key' =>'id'
		                                    ),
		             'projectmodel' => array('foreign_keys'=>array('projectid'=>'project'),
		                                     'primary_key' =>'id'
		                                    ),
		             'template'     => array('foreign_keys'=>array('projectid'=>'project'),
		                                     'primary_key' =>'id'
		                                     ),
		             'object'       => array('foreign_keys'=>array('projectid'  =>'project' ),
		                                     'self_key'    =>'parentid',
		                                     'primary_key' =>'id',
		                                     'erase'       =>array('create_userid','lastchange_userid')
		                                     ),
		             'element'      => array('foreign_keys'=>array('templateid'      =>'template',
			                                                       'folderobjectid'  =>'object',
		                                                           'default_objectid'=>'object'   ),
		                                     'primary_key' =>'id'
		                                     ),
		             'templatemodel'=> array('foreign_keys'=>array('projectmodelid'=>'projectmodel',
		                                                           'templateid'    =>'template'     ),
		                                     'primary_key' =>'id',
		                                     'replace'     =>array('text'=>'element')
		                                     ),
		             'name'         => array('foreign_keys'=>array('objectid'  =>'object',
		                                                           'languageid'=>'language'   ),
		                                     'primary_key' =>'id'
		                                     ),
		             'page'         => array('foreign_keys'=>array('objectid'  =>'object',
		                                                           'templateid'=>'template' ),
		                                     'primary_key' =>'id'
		                                     ),
		             'value'         => array('foreign_keys'=>array('pageid'   =>'page',
		                                                           'languageid'=>'language',
		                                                           'elementid'=>'element',
		                                                           'linkobjectid'=>'object'  ),
		                                     'erase'       =>array('lastchange_userid'),
		                                     'replace'     =>array('text'=>'object'),
		                                     'primary_key' =>'id'
		                                     ),
		             'link'         => array('foreign_keys'=>array('objectid'     =>'object',
		                                                           'link_objectid'=>'object'   ),
		                                     'primary_key' =>'id'
		                                     ),
		             'folder'         => array('foreign_keys'=>array('objectid'  =>'object' ),
		                                     'primary_key' =>'id'
		                                     ),
		             'file'         => array('foreign_keys'=>array('objectid'  =>'object'   ),
		                                     'primary_key' =>'id',
		                                     'binary'      =>'value'
		                                     ),
		             
		);
		
		if	( $sameDB )
			$ids['acl'] = array('foreign_keys'=>array('objectid'   => 'object',
		                                              'languageid' => 'language' ),
		                        'primary_key' =>'id'
		                        );
			 
		foreach( $ids as $tabelle=>$data )
		{
			\Logger::debug( 'Copying table '.$tabelle.' ...' );
			$mapping[$tabelle] = array();
			$idcolumn = $data['primary_key'];

			// Naechste freie Id in der Zieltabelle ermitteln.
			$stmt = $db_dest->sql( 'SELECT MAX('.$idcolumn.') FROM {t_'.$tabelle.'}');
			$maxid = intval($stmt->getOne());
			$nextid = $maxid;

			// Zu �bertragende IDs ermitteln.
			if	( count($data['foreign_keys'])==0 )
			{
				$where = ' WHERE id='.$this->projectid;
			}
			else
			{
				foreach( $data['foreign_keys'] as $fkey_column=>$target_tabelle )
				{
					$where = ' WHERE '.$fkey_column.' IN ('.join(array_keys($mapping[$target_tabelle]),',').')';
					break;
				}
			}
			$stmt = $db_src->sql( 'SELECT '.$idcolumn.' FROM {t_'.$tabelle.'} '.$where);

			foreach( $stmt->getCol() as $srcid )
			{
				\Logger::debug('Id '.$srcid.' of table '.$tabelle);
				$mapping[$tabelle][$srcid] = ++$nextid;

				$stmt = $db_src->sql( 'SELECT * FROM {t_'.$tabelle.'} WHERE id={id}');
				$stmt->setInt('id',$srcid);
				$row = $stmt->getRow();

				// Wert des Prim�rschl�ssels �ndern.
				$row[$idcolumn] = $mapping[$tabelle][$srcid];

				// Fremdschl�sselbeziehungen auf neue IDn korrigieren.
				foreach( $data['foreign_keys'] as $fkey_column=>$target_tabelle)
				{
					\Logger::debug($fkey_column.' '.$target_tabelle.' '.$row[$fkey_column]);
					
					if	( intval($row[$fkey_column]) != 0 )
						$row[$fkey_column] = $mapping[$target_tabelle][$row[$fkey_column]];
				}
				
				foreach( array_keys($row) as $key )
				{
					if	( isset($data['unique_idx']) && $key == $data['unique_idx'] )
					{
						// Nachschauen, ob es einen UNIQUE-Key in der Zieltabelle schon gibt.
						$stmt = $db_dest->sql( 'SELECT 1 FROM {t_'.$tabelle.'} WHERE '.$key."='".$row[$key]."'");
						
						if	( intval($stmt->getOne()) == 1 )
							$row[$key] = $row[$key].$zeit;

					}

					if	( !$sameDB && isset($data['erase']) && in_array($key,$data['erase']) )
						$row[$key] = null;

					if	( isset($data['self_key']) && $key == $data['self_key'] && intval($row[$key]) > 0 )
						$row[$key] = $row[$key]+$maxid;
				}
				
				if	( isset($data['replace']) )
				{
					foreach( $data['replace'] as $repl_column=>$repl_tabelle)
						foreach( $mapping[$repl_tabelle] as $oldid=>$newid)
						{
							$row[$repl_column] = str_replace('{'.$oldid.'}','{'.$newid.'}'  ,$row[$repl_column]);
							$row[$repl_column] = str_replace('"'.$oldid.'"','"'.$newid.'"'  ,$row[$repl_column]);
							$row[$repl_column] = str_replace('->'.$oldid   ,'->"'.$newid.'"',$row[$repl_column]);
						}
				}
				
				if	( isset($data['binary']) )
				{
					if	( !$db_src->conf['base64'] && $db_dest->conf['base64'] )
						$row[$data['binary']] = base64_encode($row[$data['binary']]);
					elseif	( $db_src->conf['base64'] && !$db_dest->conf['base64'] )
						$row[$data['binary']] = base64_decode($row[$data['binary']]);
				}
				
				// Daten in Zieltabelle einf�gen.
				$stmt = $db_dest->sql( 'INSERT INTO {t_'.$tabelle.'} ('.join(array_keys($row),',').') VALUES({'.join(array_keys($row),'},{').'})',$dbid_destination);
				foreach( $row as $key=>$value )
				{
					if	( !$sameDB && isset($data['erase']) && in_array($key,$data['erase']) )
						$stmt->setNull($key);
					else
                    {
                        if(is_bool($value))
                            $stmt->setBoolean($key,$value);
                        elseif(is_int($value))
                            $stmt->setInt($key,$value);
                        elseif(is_string($value))
                            $stmt->setString($key,$value);
                    }
				}
				//$sql = $db->sql( 'INSERT INTO {t_'.$tabelle.'} ('.join(array_keys($row),',').') VALUES('.join($row,',').')',$dbid_destination);
                $stmt->query();
			}

			if	( isset($data['self_key']) )
			{
				foreach( $mapping[$tabelle] as $oldid=>$newid )
				{
					$stmt = $db_dest->sql( 'UPDATE {t_'.$tabelle.'} SET '.$data['self_key'].'='.$newid.' WHERE '.$data['self_key'].'='.($oldid+$maxid),$dbid_destination );
					$stmt->query();
				}
			}
		}
		
		\Logger::debug( 'Finished copying project' );
		
		$db_dest->commit();
	}

	

	/**
	 * Ermittelt die Anzahl aller Objekte in diesem Projekt.
	 * @return int Anzahl
	 */
	public function countObjects()
	{
		$db = db_connection();
		$sql = $db->sql( 'SELECT COUNT(*) FROM {{object}} '.
		                '   WHERE projectid = {projectid}' );
		$sql->setInt( 'projectid', $this->projectid );

		return $sql->getOne();
		
	}

	
	
	/**
	 * Ermittelt die Gr��e aller Dateien in diesem Projekt.
	 * @return int Summe aller Dateigroessen
	 */
	public function size()
	{
		$db = db_connection();
		
		$sql = $db->sql( <<<SQL
		SELECT SUM(size) FROM {{file}}
		  LEFT JOIN {{object}}
		         ON {{file}}.objectid = {{object}}.id
		      WHERE projectid = {projectid}
SQL
);
		$sql->setInt( 'projectid', $this->projectid );

		return $sql->getOne();
	}
	
	
	
	/**
	 * Liefert alle verf?gbaren Projekt-Ids
	 */
	public function info()
	{
		$info = array();
		
		$info['count_objects'] = $this->countObjects();
		$info['sum_filesize' ] = $this->size();
		
		
		return $info;
	}
	
	
	

	/**
	 * Ermittelt projektübergreifend die letzten Änderungen des angemeldeten Benutzers.
	 *  
	 * @return array <string, unknown>
	 */
	public function getMyLastChanges()
	{
		
		$db = db_connection();


		$sql = $db->sql( <<<SQL
		SELECT {{object}}.id    as objectid,
		       {{object}}.filename as filename,
		       {{object}}.typeid as typeid,
		       {{object}}.lastchange_date as lastchange_date,			
		       {{name}}.name as name				
		  FROM {{object}}
		  LEFT JOIN {{name}}
		         ON {{name}}.objectid = {{object}}.id
				AND {{name}}.languageid = {languageid}
		  LEFT JOIN {{project}}
		         ON {{object}}.projectid = {{project}}.id
			  WHERE {{object}}.projectid         = {projectid}
				AND {{object}}.lastchange_userid = {userid}
		   ORDER BY {{object}}.lastchange_date DESC;
SQL
		);
		
		// Variablen setzen.
		$sql->setInt( 'projectid', $this->projectid );
		
		$language = Session::getProjectLanguage();
		$sql->setInt( 'languageid', $language->languageid );
		
		$user = Session::getUser();
		$sql->setInt( 'userid', $user->userid );
		
		return $sql->getAll();
	}
	

	/**
	 * Ermittelt projektübergreifend die letzten Änderungen.
	 *  
	 * @return array
	 */
	public static function getAllLastChanges()
	{
		$db = db_connection();

		$sql = $db->sql( <<<SQL
		SELECT {{object}}.id    as objectid,
		       {{object}}.lastchange_date as lastchange_date,
		       {{object}}.filename as filename,
		       {{project}}.id   as projectid,
			   {{project}}.name as projectname,
		       {{user}}.name       as username,
		       {{user}}.id         as userid,
		       {{user}}.mail       as usermail,
		       {{user}}.fullname   as userfullname
		  FROM {{object}}
		  LEFT JOIN {{project}}
		         ON {{object}}.projectid = {{project}}.id
		  LEFT JOIN {{user}}
		         ON {{user}}.id = {{object}}.lastchange_userid
		  ORDER BY {{object}}.lastchange_date DESC
		  LIMIT 50
SQL
		);
		
		return $sql->getAll();
	}
	


	/**
	 * Ermittelt die letzten Änderung im Projekt.
	 * @return array
	 */
	public function  getLastChanges()
	{
		
		$db = db_connection();
		
		$sql = $db->sql( <<<SQL
		SELECT {{object}}.id       as objectid,
		       {{object}}.lastchange_date as lastchange_date,
		       {{object}}.filename as filename,
		       {{object}}.typeid   as typeid,
		       {{name}}.name       as name,
		       {{user}}.name       as username,
		       {{user}}.id         as userid,
		       {{user}}.mail       as usermail,
		       {{user}}.fullname   as userfullname
		  FROM {{object}}
		  LEFT JOIN {{name}}
		         ON {{name}}.objectid = {{object}}.id
				AND {{name}}.languageid = {languageid}
		  LEFT JOIN {{user}}
		         ON {{user}}.id = {{object}}.lastchange_userid
			  WHERE {{object}}.projectid = {projectid}
		   ORDER BY {{object}}.lastchange_date DESC
SQL
		);
		
		// Variablen setzen.
		$sql->setInt( 'projectid', $this->projectid );
		
		$language = Session::getProjectLanguage();
		$sql->setInt( 'languageid', $language->languageid );
		
		return $sql->getAll();
	}
}

?>