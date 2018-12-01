<?php
// OpenRat Content Management System
// Copyright (C) 2002-2012 Jan Dankert, cms@jandankert.de
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
namespace cms\publish;

use cms\model\Project;

define('OR_PUBLISH_TARGET_SHOW',1);
define('OR_PUBLISH_TARGET_PREVIEW',2);
define('OR_PUBLISH_TARGET_EDIT',3);
define('OR_PUBLISH_TARGET_PUBLISH',4);

/**
 * Strategy-baseclass for generating and publishing content.
 *
 * @author Jan Dankert
 */
abstract class Publish
{
    abstract public function linkToObject( $from, $to );

    abstract public function isPublic();

    abstract public function isSimplePreview();

    abstract public function copy($tmp_filename,$dest_filename,$lastChangeDate=null);

    abstract public function clean();

    abstract public function close();
}

