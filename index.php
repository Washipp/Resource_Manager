<?php
	require_once 'view/build.php';
	$url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

	if(!empty($url)) {
		$url[count($url)-1] = strtolower($url[count($url)-1]);
		dispatch($url);
	} 
	//Ist der Wert nicht gesetzt wird die Standardseite (home) aufgerufen.
	else {
		buildlink('home.php', false, ' - Home');
	}
	function dispatch($url){
		if(!empty($url)) {
			switch($url[count($url)-1]) { //buildlink($filename, true = muss nicht eingeloggt sein/false = muss eingeloggt sein, title attribut)
                case 'login':
                    buildlink('login.php',false, ' - Login');
                    break;
                case 'resources':
                    buildlink('resources.php',  false, ' - Alle Ressourcen');
                    break;
                case 'addresource':
                    buildlink('addNewResource.php', false, ' - Ressource hinzufügen');
                    break;
                case 'account':
					buildlink('account.php',  false, ' - Mein Account');
					break;
                case 'logout':
                    buildlink('logout.php',  false, ' - Logout');
                    break;

				default:
					array_splice($url, 0, 1);//den URL Array an der 0-Stelle entfernen und neuindexieren.
					dispatch($url); /* Anschliessend wird die Funktion rekursiv wieder aufgerufen und überprüft, ob die nächste Stelle ein akzeptierter Link ist.*/
					break;
			}
		} else {
            buildlink('home.php', false, ' - Home');
		}
	}
?>
