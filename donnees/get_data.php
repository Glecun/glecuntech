<?php
require_once 'jsonwrapper/jsonwrapper.php';
$get = $_GET["cat"];
//Get Data Csv
$row=0;$row2=0;$nbcat=-1;
$all=array();
if (($handle = fopen("listetech.csv", "r")) !== FALSE) {
	while (($ligne = fgetcsv($handle, 280, ";")) !== FALSE) {
		//Encodage Utf-8
		foreach ($ligne as &$champ){
			$champ = utf8_encode($champ);
		}
		if($row!=0 && ($ligne[2]!="" || $ligne[0]!="")){
			if($ligne[0]!=""){
				$nbcat++;
			}
			if($nbcat==$get){
				$all[$row2]["nom"] = $ligne[2];
				$all[$row2]["url"] = $ligne[3];
				$all[$row2]["tags"] = $ligne[4];
				$all[$row2]["description"] = $ligne[5];
				$all[$row2]["utilise"] = $ligne[6];
				$all[$row2]["image"] = $ligne[7];
				$all[$row2]["note"] = $ligne[8];
				$row2++;
			}
		}
		$row++;
	}
	fclose($handle);
}
echo json_encode($all);
?>