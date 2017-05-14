<?php
    session_start();
	function buildlink($file,$controller, $access = true, $title = 'Chatraum'){

	if($access){ }//Überprüft, ob die Seite mittels $_SESSION  überprüft werden muss. falls 'true', wird nicht überprüft.
	else{
		if(!isset($_SESSION['userid'])){
			header ("Location: login");
		}
	}

	require_once 'controller/'.$controller;
?>
        <!doctype html>
	<html>
		<head>
			<?php require_once 'view/inc/head.php'; ?>
		</head>
		<body>
			<header>
				<?php require_once 'view/inc/header.php'; ?>
			</header>
			<nav>
				<?php require_once 'view/inc/navigation.php'; ?>
			</nav>
			<div class="content">
				<?php require_once 'view/pages/'.$file; ?>
			</div>
			<footer>
				<?php require_once 'view/inc/footer.php'; ?>
			</footer>
		</body>
	</html>

<?php } //Klammer zum schliessen der buildlink Funktion
?>