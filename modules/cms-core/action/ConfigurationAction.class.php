<?php

namespace cms\action;

// OpenRat Content Management System
// Copyright (C) 2002-2012 Jan Dankert, cms@jandankert.de
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; version 2.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

use Session;
/**
 * Action-Klasse fuer die Bearbeitung eines Template-Elementes.
 * 
 * @author Jan Dankert
 * @package openrat.actions
 */
class ConfigurationAction extends Action
{
	public $security = SECURITY_ADMIN;
	
	/**
	 * Konstruktor
	 */
	function __construct()
	{
	}


	public function editView()
	{
		$this->nextSubAction('show');
	}
	
	
	/**
	 * Anzeigen des Elementes
	 */
	function showView()
	{
        require_once( OR_MODULES_DIR.'/util/config-default.php');
        $conf = createDefaultConfig();
        $conf_default = $conf;
		
		$conf_cms = Session::getConfig();
		$conf_cms['system']['server'] = array( 'time'   => date('r'),
								               'os'     => php_uname('s'),
								               'host'   => php_uname('n'),
								               'release'=> php_uname('r'),
								               'machine'=> php_uname('m'),
								               'owner'  => get_current_user(),
								               'pid'    => getmypid()          );

				
		$conf_cms['system']['interpreter'] = array( 'version'             => phpversion(),
								                    'SAPI'                => php_sapi_name(),
								                    'session-name'        => session_name(),
								                    'magic_quotes_gpc'    => get_magic_quotes_gpc(),
								                    'magic_quotes_runtime'=> get_magic_quotes_runtime() );

		unset($conf_cms['language']);
		
		foreach( array('upload_max_filesize',
		               'file_uploads',
		               'memory_limit',
		               'max_execution_time',
		               'post_max_size',
		               'display_errors',
		               'register_globals'
		               ) as $iniName )
			$conf_cms['system']['environment'][ $iniName ] = ini_get( $iniName );
			
		$extensions = get_loaded_extensions();
		asort( $extensions );
		 
		foreach( $extensions as $id=>$extensionName )
			$conf_cms['system']['interpreter'][ 'extension' ][$extensionName] = 'loaded';
		
		$flatDefaultConfig = $this->flattenArray('',$conf_default);
		$flatCMSConfig     = $this->flattenArray('',Session::getConfig());
		$flatConfig        = $this->flattenArray('',$conf_cms);
		
		$config = array();
		foreach( $flatConfig as $key=>$val )
		{
			$config[] = array( 'key'=>$key,'value'=>$val,'class'=>(empty($flatCMSConfig[$key])?'readonly':(isset($flatDefaultConfig[$key]) && $flatDefaultConfig[$key]==$flatConfig[$key]?'default':'changed')));
		}
		$this->setTemplateVar('config',$config );
	}

    private function flattenArray( $prefix,$arr )
    {
        $new = array();
        foreach( $arr as $key=>$val)
        {
            if	( is_array($val) )
            {

                $splitter = "\xC2\xA0"."\xC2\xBB"."\xC2\xA0"; // NBSP+RDQUO+NBSP as UTF-8
                $new += $this->flattenArray($prefix.$key.$splitter,$val);
            }
            else
                $new[$prefix.$key] = $key=='password'?'*******************':$val;
        }
        return $new;
    }

}




?>