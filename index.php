<?php
	require_once 'view/build.php';
	$url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

	if(!empty($url)) {
		$url[count($url)-1] = strtolower($url[count($url)-1]);
		dispatch($url);
	} 
	//Ist der Wert nicht gesetzt wird die Standardseite (home) aufgerufen.
	else {
		buildlink('home.php', true, ' - Home');
	}
	function dispatch($url){
		if(!empty($url)) {
			switch($url[count($url)-1]) { //buildlink($filename, true = muss nicht eingeloggt sein/false = muss eingeloggt sein, title attribut
                case 'login':
                    buildlink('login.php','user.controller.php',true, ' - Login');
                    break;
                case 'ressources':
                    buildlink('ressources.php', 'ressource.controller.php', true, ' - Alle Ressourcen');
                    break;
                case 'addressource':
                    buildlink('addNewRessource.php','ressource.controller.php', true, ' - Ressource hinzufügen');
                    break;
                case 'account':
					buildlink('account.php', 'account.controller.php', true, ' - Mein Account');
					break;

				default:
					array_splice($url, 0, 1);//den URL Array an der 0-Stelle entfernen und neuindexieren.
					dispatch($url); /* Anschliessend wird die Funktion rekursiv wieder aufgerufen und überprüft, ob die nächste Stelle ein akzeptierter Link ist.*/
					break;
			}
		} else {
            buildlink('home.php', 'user.controller.php',true, ' - Home');
		}
	}
?>
