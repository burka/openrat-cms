<?php
// ---------------------------------------------------------------------------
// $Id$
// ---------------------------------------------------------------------------
// DaCMS Content Management System
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

class ObjectFactory
{
	function create( $objectid )
	{
		$o = new Object( $objectid );
		
		switch( $o->getType() )
		{
			case OR_TYPE_FILE:
				$x = new File( $objectid );
				break;

			case OR_TYPE_FOLDER:
				$x = new Folder( $objectid );
				break;

			case OR_TYPE_PAGE:
				$x = new Page( $objectid );
				break;

			case OR_TYPE_LINK:
				$x = new Link( $objectid );
				break;

			default:
				die( "Unknown Object-Typ: ".$o->getType() );
				debug_backtrace();
		}
		
		$x->load();
		return $x;
	}
}

?>