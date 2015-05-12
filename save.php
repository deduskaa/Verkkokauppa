<?php
$virhe = "FAIL";
$yhteysNro = mysql_connect("mysql.metropolia.fi","jennytr","Pokemon1");
$text = $_POST['newPwd'];
$md5tiiviste = hash('md5', $text);

if ($yhteysNro) {
	if (mysql_selectdb('jennytr')){
		$sql_lauseke = 'INSERT into Pokemon(ID, Nimi,  Sukupuoli, Hinta) values(' .
		"\"{$_POST['ID']}\", " .
		"\"{$_POST['Nimi']}\", " .
		"\"{$_POST['Sukupuoli']}\", " .
		"\"{$_POST['Hinta']}\", " .
		"\"$md5tiiviste\");";
		mysql_query ($sql_lauseke) or $virhe = "Virhe: " . mysql_errno() . ": " . mysql_error(); 
	}
}


?>