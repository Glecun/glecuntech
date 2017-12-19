<?php

//Get entete Csv
$row=0;
$tab_categorie=array();
if (($handle = fopen("donnees/listetech.csv", "r")) !== FALSE) {
	while (($ligne = fgetcsv($handle, 280, ";")) !== FALSE) {
		//Encodage Utf-8
		foreach ($ligne as &$champ){
			$champ = utf8_encode($champ);
		}
		if($row!=0 && ($ligne[2]!="" || $ligne[0]!="")){
			if($ligne[0]!=""){
				$tab_categorie[$ligne[0]]=$ligne[1];
			}
		}
		$row++;
	}
	fclose($handle);
}
?>