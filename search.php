<?php 
$name = $_GET['searchText'];
$sql = "SELECT 
	Pokemon.Nimi,
	Sukupuoli.Sukupuoli,
	Hinta.Hinta,
	Pokemon.SivuUrl,
	Pokemon.Kuvaus,
	Kuva.URL,
	Tyyppi.Tyyppi
FROM
	Pokemon,
	Tyyppi,
	PokemonTyyppi,
	Sukupuoli,
	Hinta,
	Kuva,
	PokemonKuva
WHERE
	Hinta.ID = Pokemon.Hinta AND
	Sukupuoli.ID = Pokemon.Sukupuoli AND
	Pokemon.Nimi = \"$name\" AND
	Kuva.ID = PokemonKuva.KuvaID AND
	PokemonKuva.PokemonID = Pokemon.ID AND
	Pokemon.ID=PokemonTyyppi.PokemonID AND
	Tyyppi.ID=PokemonTyyppi.TyyppiID; ";
		
	$STH = @$DBH->query($sql);
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$row = $STH->fetch();
?>