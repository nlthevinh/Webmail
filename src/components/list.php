<?php
//Info base
$dbhost = "localhost";
$dbuser = "mail";
$dbpass = "rtlry";
$db = "test";
$user = "";
$liste = "";
$data = array();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

if (isset($_GET["user"])){
	$user = $_GET["user"];
	try{
		$bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
	}
	catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare("SELECT * FROM messages WHERE destinataire=? ORDER BY date DESC");
	$req->execute(array($_GET["user"]));
	
	while ($donnees = $req->fetch()) {
		$apercu = substr($donnees['message'], 0, 20);
		if(strlen($donnees['message'])>20){
			$apercu .="...";
		}
        
		array_push($data, array(
			'date' => $donnees['date'], 
			'expediteur' => $donnees['expediteur'],
			'user' => $user,
			'message' => $donnees['message'],
			'id' => $donnees['id'],
			'apercu' => $apercu
		));

		echo $data['message'];
	}
	
	header("Content-type: application/json");
	echo json_encode($data);
}
?>
