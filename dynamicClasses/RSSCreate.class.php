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
// Revision 1.1  2004-10-14 21:14:52  dankert
// Erzeugen eines RSS-Feeds aus einem Ordner
//
// ---------------------------------------------------------------------------



/**
 * Erstellen eines Hauptmenues
 * @author Jan Dankert
 */
class RSSCreate /*extends DynamicElement*/
{
	/**
	 * Bitte immer alle Parameter in dieses Array schreiben, dies ist fuer den Web-Developer hilfreich.
	 * @type String
	 */
	var $parameters  = Array(
		'htmlentities'    =>'Escape HTML-Tags in RSS-Feed, default: false',
		'folderid'        =>'Id of the folder whose pages should go into the RSS-Feed, default: the root folder',
		'feed_url'        =>'Url of the feed, default: blank',
		'feed_title'      =>'Title of the feed, default: Name of folder',
		'feed_description'=>'Description of the feed, default: Description of folder'
		);

	var $htmlentities = false;
	var $folderid     = 0;

	/**
	 * Bitte immer eine Beschreibung benutzen, dies ist fuer den Web-Developer hilfreich.
	 * @type String
	 */
	var $description      = 'Creates an RSS-Feed of pages in a folder';
	var $api;

	var $feed_url         = '';
	var $feed_title       = '';
	var $feed_description = '';

	// Erstellen des Hauptmenues
	function execute()
	{
		$feed = array();

		// Lesen des Root-Ordners
		if	( intval($this->folderid) == 0 )
			$folder = new Folder( $this->api->getRootObjectId() );
		else
			$folder = new Folder( intval($this->folderid) );

		$folder->load();

		if	( $this->feed_title == '' )
			$this->feed_title = $folder->name;

		if	( $this->feed_description == '' )
			$this->feed_description = $folder->desc;

		$feed['title'      ] = $this->feed_title;			
		$feed['description'] = $this->feed_description;			
		$feed['url'        ] = $this->feed_url;			
		$feed['items'      ] = array();			

		// Schleife ueber alle Inhalte des Root-Ordners
		foreach( $folder->getObjectIds() as $id )
		{
			$o = new Object( $id );
			$o->languageid = $this->page->languageid;
			$o->load();
			if ( $o->isPage ) // Nur wenn Ordner
			{
				$p = new Page( $id );
				$p->load();

				$item = array();
				$item['title'      ] = $p->name;
				$item['description'] = $p->desc;
				$item['pubDate'    ] = $p->lastchange_date;
				
				$feed['items'][] = $item;
			}
		}
		
		$rss = $this->rss($feed);

		if	( $this->htmlentities )
			$rss = htmlentities( $rss );

		$this->api->output( $rss );
	}
	
	
	function rss($input, $stylesheet='')
	{
		print_r($input);
		 // Builds the XML RSS schema using the array
		$input["encoding"]  = (empty($input["encoding"] ))?"UTF-8":$input["encoding"];
		$input["language"]  = (empty($input["language"] ))?"en-us":$input["language"];
		
		if	( empty($input['title'      ])) $input['title'      ] = ''; 
		if	( empty($input['description'])) $input['description'] = ''; 
		if	( empty($input['link'       ])) $input['link'       ] = ''; 
		$rss = '<?xml version="1.0" encoding="'.$input["encoding"].'"?>';
		$rss .= (!empty($stylesheet))?"\n".'<?xml-stylesheet type="text/xsl" href="'.$stylesheet.'"?>':"";
		$rss .= <<<__RSS__
		
		<rss version="2.0">
		<channel>
		<title>{$input["title"]}</title>
		<description>{$input["description"]}</description>
		<link>{$input["link"]}</link>
		<language>{$input["language"]}</language>
		<generator></generator>
		
__RSS__;
		    foreach($input["items"] as $item)
		    {
				if	( empty($item['title'      ])) $item['title'      ] = ''; 
				if	( empty($item['description'])) $item['description'] = ''; 
		        $data = date("r", $item["pubDate"]);
		        $rss .= "\n<item>\n<title>".$item["title"]."</title>";
		        $rss .= "\n<description><![CDATA[".$item["description"]."]]></description>";
		        if (!empty($item["pubDate"]))
		            $rss .= "\n<pubDate>".date("r", $item["pubDate"])."</pubDate>";
		        if (!empty($item["link"]))
		            $rss .= "\n<link>".$item["link"]."</link>";
		        $rss .= "\n</item>\n";
		    }
			$rss .= "\n</channel>\n</rss>";
		return $rss;
	}
}