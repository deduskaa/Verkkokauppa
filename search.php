<?php session_start();
require_once('yhteiset/dbYhteys.php');
require_once('yhteiset/funktiot.php');
require_once('yhteiset/dbFunctions.php');
?>
<?php
if(isset($_POST['submit'])){
	$sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'"; 
	//-run  the query against the mysql query function 
	$result=mysql_query($sql);
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

?>

