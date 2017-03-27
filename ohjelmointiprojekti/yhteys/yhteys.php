<?php

	$nimi = htmlentities($_POST["nimi"]);
	$maili = htmlentities($_POST["maili"]);
	$aihe = htmlentities($_POST["aihe"]);
	$viesti = htmlentities($_POST["viesti"]);

	if (empty($nimi) || empty($maili) || empty($aihe) || empty($viesti) ){
		
		echo "kaikki tiedot ovat pakollisia";
		exit();
		}
	
try	{
	$connection = new PDO("mysql:host=localhost;dbname=s1300760", "s1300760", "FTokKNx6");
	
	$query = $connection->prepare("INSERT INTO `s1300760`.`yhteys` (`nimi`, `maili`, `aihe`, `viesti`) VALUES (?,?,?,?);");
	
	
	
	$query->execute(array($nimi, $maili, $aihe, $viesti));

	if ($query->rowCount()>0){
		include "onnistui.html";
		}
	else {
	include "eionnistunut.html";
		}
	
	
	} catch (PDOException $e)	{
		die("VIRHE: " . $e->getMessage());
		}
	
	
?>