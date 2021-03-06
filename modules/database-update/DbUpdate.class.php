<?php

use database\Database;


class DbUpdate 
{
    // This is the required DB version:
    const SUPPORTED_VERSION      = 21;
    // ----------------------------^^-----------------------------

    const STATUS_UPDATE_PROGRESS = 0;
    const STATUS_UPDATE_SUCCESS  = 1;

    public function isUpdateRequired( Database $db )
    {
        $version = $this->getDbVersion($db);

        Logger::debug("Need DB-Version: ".self::SUPPORTED_VERSION."; Actual DB-Version: ".$version);

        if	( $version == self::SUPPORTED_VERSION )
            // Cool, der aktuelle DB-Stand passt zu dieser Version. Das ist auch der Normalfall. Weiter so.
            return false;

        elseif	( $version > self::SUPPORTED_VERSION )
            // Oh oh, in der Datenbank ist eine neuere Version, als wir unterstützen.
            throw new \LogicException('Actual DB version is not supported. '."DB-Version is $version, but ".OR_TITLE." ".OR_VERSION." only supports version ".self::SUPPORTED_VERSION );

        else
            return true; // Update required.
    }



    /**
     * @param Database $db
     */
    public function update(Database $db )
	{
		$version = $this->getDbVersion($db);
		

		for( $installVersion = $version + 1; $installVersion <= self::SUPPORTED_VERSION; $installVersion++ )
		{
			if	( $installVersion > 2 ) // Up to version 2 there was no table 'version'.
			{
			    $db->start();
				$sql = $db->sql('INSERT INTO {{version}} (id,version,status,installed) VALUES( {id},{version},{status},{time} )',$db->id);
				$sql->setInt('id'     , $installVersion);
				$sql->setInt('version', $installVersion);
				$sql->setInt('status' , self::STATUS_UPDATE_PROGRESS);
				$sql->setInt('time'   , time()         );
				$sql->query();
				$db->commit();
			}
			
			$updaterClassName = 'DBVersion'.str_pad($installVersion, 6, '0', STR_PAD_LEFT);
			require(__DIR__.'/update/'.$updaterClassName.'.class.php');

            $db->start();
            /** @var \database\DbVersion $updater */
            $updater = new $updaterClassName( $db );
			
			$updater->update();
			$db->commit();

			if	( $installVersion > 2 )
			{
                $db->start();
				$sql = $db->sql('UPDATE {{version}} SET status={status},installed={time} WHERE version={version}',$db->id);
				$sql->setInt('status' , self::STATUS_UPDATE_SUCCESS);
				$sql->setInt('version', $installVersion);
				$sql->setInt('time'   , time()         );
				$sql->query();
				$db->commit();
			}
		}
	}


    /**
     * Ermittelt die Version des Datenbank-Schemas.
     * @param Database $db
     * @return int
     */
	private function getDbVersion( Database $db )
	{
		$versionTableExists = $this->testQuery( $db,'SELECT 1 FROM {{version}}' );
		
		if	( $versionTableExists )
		{
			// Prüfen, ob die vorherigen Updates fehlerfrei sind. 
			$sql = $db->sql(<<<SQL
	SELECT COUNT(*) FROM {{version}} WHERE STATUS=0
SQL
					,$db->id);
			$countErrors = $sql->getOne();
			if	( $countErrors > 0 )
				throw new \LogicException('Database error: There are dirty versions (means: versions with status 0), see table VERSION for details.');
			
			// Aktuelle Version ermitteln.
			$sql = $db->sql(<<<SQL
	SELECT MAX(version) FROM {{version}}
SQL
					,$db->id);
			$version = $sql->getOne();

			if	( is_numeric($version) )
				return $version; // Aktuelle Version.s
			else
				// Tabelle 'version' ist noch leer.
			    // Tabelle 'version' wurde in Version 2 angelegt.
				return 2;
		}
		else
		{
			$projectTableExists = $this->testQuery( $db,'SELECT 1 FROM {{project}}');
				
			if	( $projectTableExists )
				// Entspricht dem Stand vor Einführung der automatischen Migration.
				return 1; 
			else
				// Es gibt gar keine Tabellen, es muss also alles neu angelegt werden.
				return 0;
		}
	}


    /**
     * Stellt fest, ob eine DB-Anfrage funktioniert.
     * @param $db Database
     * @param $sql
     * @return <code>true</code> falls SQL funktioniert.
     */
	private function testQuery( $db,$sql )
    {
        try {
            $sql = $db->sql($sql,$db->id);
            $sql->execute();
            return true; // Bisher alles ok? Dann funktioniert die Query.
        }
        catch( Exception $e )
        {
            // Query funktioniert nicht.
            return false;
        }
    }
}

?>