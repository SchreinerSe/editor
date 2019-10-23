<?php
	//Fehlerausgabe einschalten
	ini_set('error_reporting', E_ALL);

	// Prüfen ob eine Datei übergeben wurde
	if(!isset($_REQUEST['datei']))
	{
		die("Keine Datei angegeben.");
	}
	else
	{
		$datei=$_REQUEST['datei'];
		// prüfen ob übergebene Datei der Editor selbst ist
		if($datei == basename(__FILE__))
		{
			die("Der Editor darf nicht bearbeitet werden!");
		}
		// wenn das Formular ebgesendet wurde
		if (isset($_REQUEST['speichern']))
		{
			// Datei soeichern
			$inhalt=$_REQUEST['inhalt'];
			// Dateiinhalt schreiben
			file_put_contents($datei, $inhalt);
			echo "beispiel.txt wurde überschrieben";
		}
		else
		{
			// Dateiinhalt lesen
			$inhalt = file_get_contents($datei);
			// Formular ausgeben
?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" methode="GET">
				<input type="hidden" name="datei" value="<?php echo $datei; ?>">
				<textarea id="inhalt" name="inhalt" cols="100" rows="40"><?php echo $inhalt; ?></textarea><br>
				<input type="submit" name="speichern" value="speichern">
			</form>
<?php		
		}
	}
?>
