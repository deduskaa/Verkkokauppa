<?php session_start();
require_once('yhteiset/dbYhteys.php');
require_once('yhteiset/funktiot.php');
require_once('yhteiset/dbFunctions.php');
?>
<?php
if(isset($_POST['submit'])){
	if(isset($_GET['go'])){
		if(preg_match("^/[A-Za-z]+/", $_POST['name'])){ 
			$name=$_POST['searchText']; 
		}
		$sql="
		SELECT 
		Pokemon.Nimi,
		Tyyppi.Tyyppi,
		Sukupuoli.Sukupuoli,
		Hinta.Hinta,
		Kuva.URL
		FROM
		Pokemon,
		Tyyppi,
		Sukupuoli,
		Hinta,
		Kuva,
		PokemonKuva
		WHERE
		Tyyppi.ID = Pokemon.Tyyppi1 AND 
		Hinta.ID = Pokemon.Hinta AND
		Sukupuoli.ID = Pokemon.Sukupuoli AND
		Pokemon.Nimi = ". $name ." AND
		Kuva.ID = PokemonKuva.KuvaID AND
		PokemonKuva.PokemonID = Pokemon.ID;"; 
		//-run  the query against the mysql query function 
		$result=mysql_query($sql);
		echo($result);
		while($row=mysql_fetch_array($result)){ 
			$name=$row['submit'];  
			//-display the result of the array 
			echo "<ul>\n"; 
			echo "<li>".$name."</a></li>\n"; 
			echo "</ul>"; 
		} 
	}else{
	"<p>Search for something!</p>";
	}
}

?>

