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


// Standard Mime-Type 
define('OR_FILE_DEFAULT_MIMETYPE','application/octet-stream');


/**
 * Darstellen einer Datei
 *
 * @version $Revision$
 * @author $Author$
 * @package openrat.objects
 */
class File extends Object
{
	var $fileid;

	var $size          = 0;
	var $value         = '';
	var $extension     = '';
	var $log_filenames = array();
	var $fullFilename  = '';
	var $publish       = null;
	var $mime_type     = '';
	var $width         = null;
	var $height        = null;
	
	var $tmpfile;



	/**
	 * Um Probleme mit BLOB-Feldern und Datenbank-Besonderheiten zu vermeiden,
	 * kann der Binaerinhalt BASE64-kodiert gespeichert werden.
	 * @type Boolean
	 */
	var $storeValueAsBase64 = false;



	/**
	 * Konstruktor
	 *
	 * @param Objekt-Id
	 */
	function File( $objectid='' )
	{
		global $conf,$SESS;
		
		$db = Session::getDatabase();
		$this->storeValueAsBase64 = $db->conf['base64'];

		$this->Object( $objectid );
		$this->isFile = true;
	}



	/**
	  * Ermitteln des Dateinamens dieser Datei
	  *
	  * @return String Kompletter Dateiname, z.B. '/pfad/datei.jpeg'
	  */
	function full_filename()
	{
		if	( !empty($this->fullFilename) )
			return $this->fullFilename;

		$filename = parent::full_filename();

		if	( !empty($this->extension) )
			$filename .= '.'.$this->extension;

		$this->fullFilename = $filename;
		return $filename;
	}
	
	
	
	/**
	  * Ermitteln des Dateinamens dieser Datei (ohne Pfadangabe)
	  *
	  * @return String Kompletter Dateiname, z.B. '/pfad/datei.jpeg'
	  */
	function filenameWithExtension()
	{
		if	( $this->extension != '' )
			return $this->filename.'.'.$this->extension;
		else	return $this->filename;
	}



	/**
	  * Ermitteln aller Eigenschaften
	  *
	  * @return Array
	  */
	function getProperties()
	{
		return array_merge( parent::getProperties(),
		                    array('full_filename'=>$this->fullFilename,
		                          'extension'    =>$this->extension,
		                          'size'         =>$this->size,
		                          'mimetype'     =>$this->mimetype()   ) );
	}



	/**
	 * @deprecated
	 */
	function getFileObjectIdsByExtension( $extension )
	{
		global $SESS;
		$db = db_connection();
		
		$sqlquery = 'SELECT * FROM {t_object} ';

		if   ( $extension != '' )
		{
			$sqlquery .= " WHERE extension='";

			$ext = explode(',',$extension);
			$sqlquery .= implode( "' OR extension='",$ext );
			$sqlquery .= "' AND is_file=1 AND projectid={projectid}";
		}
		else
		{
			$sqlquery .= " WHERE is_file=1 AND projectid={projectid}";
		}

		$sql = new Sql( $sqlquery );
		$sql->setInt( 'projectid',$SESS['projectid'] );
		
		return $db->getCol( $sql );
	}



	/**
	  * Es werden Objekte zu einer Dateierweiterung ermittelt
	  *
	  * @param String Dateierweiterung ohne fuehrenden Punkt (z.B. 'jpeg')
	  * @return Array Liste der gefundenen Objekt-IDs
	  */
	function getObjectIdsByExtension( $extension )
	{
		$db = db_connection();
		
		$sql = new Sql( 'SELECT {t_file}.objectid FROM {t_file} '.
		                ' LEFT JOIN {t_object} '.
		                '   ON {t_object}.id={t_file}.objectid'.
		                ' WHERE {t_file}.extension={extension}'.
		                '   AND {t_object}.projectid={projectid}' );
		$sql->setInt   ( 'projectid',$this->projectid );
		$sql->setString( 'extension',$extension       );
		
		return $db->getCol( $sql );
	}



	/**
	 * Ermittelt den Mime-Type zu dieser Datei
	 *
	 * @return String Mime-Type  
	 */
	function mimeType()
	{
		if	( !empty( $this->mime_type ) )
			return $this->mime_type;

		global $conf;
		$mime_types = $conf['mime-types'];
		
		if	( !empty($this->extension))
		{
			$ext = $this->extension;
		}
		else
		{
			$pos = strrpos($this->filename,'.');
			if	( $pos === false )
				$ext = '';
			else
				$ext = substr($this->filename,$pos+1);
		}
		
		$ext = strtolower($ext);

		if	( !empty($mime_types[$ext]) )
			$this->mime_type = $mime_types[$ext];
		else
			// Wenn kein Mime-Type gefunden, dann Standartwert setzen
			$this->mime_type = OR_FILE_DEFAULT_MIMETYPE;
			
		return( $this->mime_type );
	}



	/**
	 * Ermittelt Breite und H�he des Bildes.<br>
	 * Die Werte lassen sich anschlie�end �ber die Eigenschaften "width" und "height" ermitteln.
	 */
	function getImageSize()
	{
		if	( is_null($this->width) )
		{
			$this->write(); // Datei schreiben
			
			// Bildinformationen ermitteln
			$size = getimagesize( $this->tmpfile() );
	
			// Breite und Hoehe des aktuellen Bildes	 
			$this->width  = $size[0]; 
			$this->height = $size[1];
		}
	}



	/**
	 * Veraendert die Bildgroesse eines Bildes
	 *
	 * Diese Methode sollte natuerlich nur bei Bildern ausgefuehrt werden.
	 *
	 * @param Neue Breite
	 * @param Neue Hoehe
	 * @param Bildgr��enfaktor
	 * @param Altes Format als Integer-Konstante IMG_xxx
	 * @param Neues Format als Integer-Konstante IMG_xxx
	 * @param Jpeg-Qualitaet (sofern neues Format = Jpeg)
	 */
	function imageResize( $newWidth,$newHeight,$factor,$oldformat,$newformat,$jpegquality )
	{
		global $conf;

		$this->write(); // Datei schreiben
		
		// Bildinformationen ermitteln
		$size = getimagesize( $this->tmpfile() );

		// Breite und Hoehe des aktuellen Bildes	 
		$oldWidth  = $size[0]; 
		$oldHeight = $size[1];
		$aspectRatio = $oldHeight / $oldWidth; // Seitenverhaeltnis

		// Wenn Breite und Hoehe fehlen, dann Bildgroesse beibehalten
		if	( $newWidth == 0 && $newHeight == 0)
		{
			if	( $factor != 0 && $factor != 1 )
			{
				$newWidth  = $oldWidth  * $factor; 
				$newHeight = $oldHeight * $factor;
				$resizing = true;
			}
			else
			{
				$newWidth  = $oldWidth; 
				$newHeight = $oldHeight;
				$resizing = false;
			}
		}
		else
		{
			$resizing = true;
		}

		// Wenn nur Breite oder Hoehe angegeben ist, dann
		// das Seitenverhaeltnis beibehalten
		if	( $newWidth == 0 )
			$newWidth = $newHeight / $aspectRatio; 
		
		if	( $newHeight == 0 )
			$newHeight = $newWidth * $aspectRatio; 


		switch( $oldformat )
		{
			case IMG_GIF: // GIF

				$oldImage = ImageCreateFromGIF( $this->tmpfile ); 
				break;

			case IMG_JPG: // JPEG

				$oldImage = ImageCreateFromJPEG($this->tmpfile);
				break;

			case IMG_PNG: // PNG

				$oldImage = imagecreatefrompng($this->tmpfile);
				break;

			default:
				die('unsupported image format "'.$this->extension.'", cannot load image. resize failed');
		}

		// Ab Version 2 der GD-Bibliothek sind TrueColor-Umwandlungen moeglich.
		global $conf;
 		$hasTrueColor = $conf['image']['truecolor'];

		switch( $newformat )
		{
			case IMG_GIF: // GIF

				if	( $resizing )
				{
					$newImage = ImageCreate($newWidth,$newHeight); 
					ImageCopyResized($newImage,$oldImage,0,0,0,0,$newWidth,
						$newHeight,$oldWidth,$oldHeight); 
				}
				else
				{
					$newImage = &$oldImage;
				} 

				ImageGIF($newImage, $this->tmpfile() );
				$this->extension = 'gif';

				break;

			case IMG_JPG: // JPEG

				if	( !$resizing )
				{
					$newImage = &$oldImage;
				} 
				elseif   ( $hasTrueColor )
				{
					// Verwende TrueColor (GD2)
					$newImage = imageCreateTrueColor( $newWidth,$newHeight );
					ImageCopyResampled($newImage,$oldImage,0,0,0,0,$newWidth,
					$newHeight,$oldWidth,$oldHeight);
				}
				else
				{
					// GD Version 1.x unterstuetzt kein TrueColor
					$newImage = ImageCreate($newWidth,$newHeight);
	
					ImageCopyResized($newImage,$oldImage,0,0,0,0,$newWidth,
					$newHeight,$oldWidth,$oldHeight);
				}
	
				ImageJPEG($newImage, $this->tmpfile,$jpegquality ); 
				$this->extension = 'jpeg';

				break;

			case IMG_PNG: // PNG

				if	( !$resizing )
				{
					$newImage = &$oldImage;
				} 
				elseif   ( $hasTrueColor )
				{
					// Verwende TrueColor (GD2)
					$newImage = imageCreateTrueColor( $newWidth,$newHeight );
		
					ImageCopyResampled($newImage,$oldImage,0,0,0,0,$newWidth,
					$newHeight,$oldWidth,$oldHeight); 
				}
				else
				{
					// GD Version 1.x unterstuetzt kein TrueColor
					$newImage = ImageCreate($newWidth,$newHeight);
		
					ImageCopyResized($newImage,$oldImage,0,0,0,0,$newWidth,
					$newHeight,$oldWidth,$oldHeight); 
				}
		
				imagepng( $newImage,$this->tmpfile() );
				$this->extension = 'png';
				
				break;
				
			default:
				die('unsupported image format "'.$newformat.'", cannot resize');
		} 

		$f = fopen( $this->tmpfile(), "r" );
		$this->value = fread( $f,filesize($this->tmpfile()) );
		fclose( $f );

		imagedestroy( $oldImage );
		//imagedestroy( $newImage );
	}


	// Lesen der Datei aus der Datenbank
	function load()
	{
		$db = db_connection();

		$sql = new Sql( 'SELECT id,extension,size'.
		                ' FROM {t_file}'.
		                ' WHERE objectid={objectid}' );
		$sql->setInt( 'objectid',$this->objectid );
		$row = $db->getRow( $sql );
		
		if	( count($row)!=0 )
		{
			$this->fileid    = $row['id'       ];
			$this->extension = $row['extension'];
			$this->size      = $row['size'     ];
		}
		
		$this->objectLoad();
	}



	function delete()
	{
		$db = db_connection();

		// Datei l?schen
		$sql = new Sql( 'DELETE FROM {t_file} '.
		                '  WHERE objectid={objectid}' );
		$sql->setInt( 'objectid',$this->objectid );
		$db->query( $sql );
		
		$this->objectDelete();
	}


	/**
	 * Stellt anhand der Dateiendung fest, ob es sich bei dieser Datei um ein Bild handelt
	 */
	function isImage()
	{
		return substr($this->mimeType(),0,6)=='image/';
	}


	function extension()
	{
		if ($this->extension != '')
			return $this->extension;

		$this->load();
		return $this->extension;
	}


	// Einen Dateinamen in Dateiname und Extension aufteilen
	function parse_filename($filename)
	{
		$filename = basename($filename);

		$p = strrpos($filename, '.');
		if ($p !== false)
		{
			$this->extension = substr($filename, $p +1);
			$this->filename = substr($filename, 0, $p);
		}
		else
		{
			$this->extension = '';
			$this->filename = $filename;
		}
	}


	function save()
	{
		global $SESS;
		$db = db_connection();
		
		$sql = new Sql( <<<EOF
UPDATE {t_file} SET
  size      = {size},
  extension = {extension}
  WHERE objectid={objectid}
EOF
);
		$sql->setString('size'     ,$this->size      );
		$sql->setString('extension',$this->extension );
		$sql->setString('objectid' ,$this->objectid  );
		$db->query( $sql );
		
		$this->objectSave();
	}


	/**
	 * Kopieren des Inhaltes von einer anderen Datei
	 * @param ID der Datei, von der der Inhalt kopiert werden soll
	 */
	function copyValueFromFile( $otherfileid )
	{
		$of = new File( $otherfileid );
		$this->value = $of->loadValue();
		$this->saveValue();
	}


	/**
	 * Lesen der Datei aus der Datenbank.
	 */
	function loadValue()
	{
		if	( is_file($this->tmpfile()))
			return implode('',file($this->tmpfile())); // From cache
			
		$db = db_connection();

		$sql = new Sql( 'SELECT size,value'.
		                ' FROM {t_file}'.
		                ' WHERE objectid={objectid}' );
		$sql->setInt( 'objectid',$this->objectid );
		$row = $db->getRow( $sql );
		
		if	( count($row) != 0 )
		{
			$this->value = $row['value'];
			$this->size  = $row['size' ];
		}

		if	( $this->storeValueAsBase64 )
			$this->value = base64_decode( $this->value );

		// Store in cache.
		$f = fopen( $this->tmpfile(),'w' );
		fwrite( $f,$this->value );
		fclose( $f );
			
		return $this->value;
	}


	/**
	 * Speichert den Inhalt in der Datenbank.
	 */
	function saveValue( $value = '' )
	{
		$db = db_connection();

		$sql = new Sql( 'UPDATE {t_file}'.
		                ' SET value={value}, '.
		                '      size={size}   '.
		                ' WHERE objectid={objectid}' );
		$sql->setString( 'objectid' ,$this->objectid      );
		$sql->setInt   ( 'size'     ,strlen($this->value) );
		
		if	( $this->storeValueAsBase64 )
			$sql->setString( 'value',base64_encode($this->value) );
		else
			$sql->setString( 'value',$this->value );

		$db->query( $sql );
	}


	/**
	 * Lesen der Datei aus der Datenbank und schreiben in temporaere Datei
	 */
	function write()
	{
		if	( !is_file($this->tmpfile()) )
			$this->loadValue();
	}


	function add()
	{
		$db = db_connection();

		$this->objectAdd();
		
		$sql = new Sql('SELECT MAX(id) FROM {t_file}');
		$this->fileid = intval($db->getOne($sql))+1;

		$sql = new Sql('INSERT INTO {t_file}'.
		               ' (id,objectid,extension,size,value)'.
		               " VALUES( {fileid},{objectid},{extension},0,'' )" );
		$sql->setInt   ('fileid'   ,$this->fileid        );
		$sql->setInt   ('objectid' ,$this->objectid      );
		$sql->setString('extension',$this->extension     );

		$db->query( $sql );
		
		$this->saveValue();
	}	


	function publish()
	{
		if	( ! is_object($this->publish) )
			$this->publish = new Publish();

		$this->write();
		$this->publish->copy( $this->tmpfile(),$this->full_filename() );
		
		$this->publish->publishedObjects[] = $this->getProperties();
	}
	

	/**
	 * Ermittelt einen tempor�ren Dateinamen f�r diese Datei.
	 */
	function tmpfile()
	{
		if	( $this->tmpfile == '' )
		{
			$db = db_connection();
			$this->tmpfile = $this->getTempDir().'/openrat_db'.$db->id.'_'.$this->objectid.'.tmp';
		}
		return $this->tmpfile;
	}
	
	
	function setTimestamp()
	{
		@unlink( $this->tmpfile() );
		
		parent::setTimestamp();
	}
	
}

?>