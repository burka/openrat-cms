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
// Revision 1.2  2004-05-02 14:49:37  dankert
// Einf�gen package-name (@package)
//
// Revision 1.1  2004/04/24 15:14:52  dankert
// Initiale Version
//
// ---------------------------------------------------------------------------


/**
 * Action-Klasse fuer die Darstellung des Unter-Framesets
 * @author $Author$
 * @version $Revision$
 * @package openrat.actions
 */

class MainAction extends Action
{
	var $defaultSubAction = 'show';
	
	function show()
	{
		if	( $this->getRequestVar('callSubaction')!='')
		{
			$this->setSessionVar( $this->getRequestVar('callAction').'action',$this->getRequestVar('callSubaction') );
		}

		$this->setTemplateVar('frame_src_main_menu',Html::url( array('action'=>'mainmenu'                        ,'subaction'=>$this->getRequestVar('callAction'   ) ) ));
		$this->setTemplateVar('frame_src_main_main',Html::url( array('action'=>$this->getRequestVar('callAction'),'subaction'=>$this->getSessionVar( $this->getRequestVar('callAction').'action' ) ) ));
		
		$this->forward('frameset_main');
	}

}


?>