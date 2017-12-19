<?php

namespace cms\action;

use cms\model\Value;
use cms\model\Folder;
use cms\model\Object;

use Logger;
use Session;

/**
 * Action-Klasse zum Anzeigen der Workbench
 * @author Jan Dankert
 * @package openrat.actions
 */
class WorkbenchAction extends Action
{
	public $security = SECURITY_GUEST;

	private $perspective;
	
	/**
	 * Konstruktor
	 */
	function __construct()
	{
		global $conf;
		$this->perspective = Session::get('perspective');
		
		
		
	}


	/**
	 * Ersetzt den Inhalt mit einer anderen Datei
	 */
	public function showView()
	{
		global $conf;
		global $preselectedobjects;

		
		$preselectedobjects = array();;
		// Zuletzt geändertes Objekt laden.
		if	( $this->perspective == 'normal' )
		{
			$project = Session::getProject();
			$rootFolder = new Folder( $project->getRootObjectId() );
			$rootFolder->load();
			$preselectedobjects[] = $rootFolder;
			
			if	( $conf['login']['start']['start_lastchanged_object'] )
			{
				$user    = Session::getUser();
				
				$objectid = Value::getLastChangedObjectInProjectByUserId($project->projectid, $user->userid);
				if	( Object::available($objectid))
				{
					$object = new Object($objectid);
					$object->load();
					
					Logger::debug('preselecting object '.$objectid);
					$preselectedobjects[] = $object;
				}
			}
		}
		
		global $viewconfig;
		
		Logger::debug('Workbench is using perspektive: '.$this->perspective);
		$viewconfig = parse_ini_file('themes/default/layout/perspective/'.$this->perspective.'.ini.php',true);
		
		require_once('themes/default/layout/perspective/window.php');
		require_once('themes/default/layout/perspective/'.$this->perspective.'.php');
		// Ausgabe fertig.
		exit;
	}
}

?>