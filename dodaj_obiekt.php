<html>
<head>
<title>Dodaj nowy obiekt</title>
</head>
<meta charset="utf-8">
    <body>

<?php

include "autoryzacja.php";
 error_reporting(E_ALL);
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());


if($_POST['kraj']!="")
{
/*echo "INSERT INTO obiekt (kraj, miasto, adres, cena_noc, id_uzytkownik) VALUES 
(
'".$_POST['kraj']."',
'".$_POST['miasto']."',
'".$_POST['adres']."',
'".$_POST['cena_noc']."',
".$_POST['id_uzytkownik']."

)";
*/
mysqli_query
(
$conn, "INSERT INTO obiekt (kraj, miasto, adres, cena_noc, id_uzytkownik) VALUES 
(
'".$_POST['kraj']."',
'".$_POST['miasto']."',
'".$_POST['adres']."',
'".$_POST['cena_noc']."',
".$_POST['id_uzytkownik']."

)"
);
echo '<div id="dodane">';
echo "Obiekt został dodany do bazy.<br>";

echo '<a href="logowanie.php">Powrót do strony logowania</a>';
echo '</div>';
}

else
{




echo'
<a href="logowanie.php">Powrót do logowania</a>
<form action="dodaj_obiekt.php" method="post">

Podaj kraj: <input name="kraj"><br>
Podaj miasto: <input name="miasto"><br>
Podaj adres: <input name="adres"><br>
Podaj cenę za noc: <input name="cena_noc"><br>
<input type="hidden" name="id_uzytkownik" value="'.$_GET['id_uzytkownik'].'">
    <br>
 
<input type="submit" value="Dodaj obiekt">
</form>
<style>
form
{
	text-align:center;
	font-size: 40px;
background-color:#99FF66;
	border:2px solid blue;
	border-radius:50px;
	
	padding: 100px;
}

body
{
		background-image:url("embossed-diamond.png");
	
}
input
{
	margin:5px;
	font-size:20px;
}
label
{
	font-size:25px;
}
form
{
	width:40%;
}
#dodane
{
		background-image:url("embossed-diamond.png");
}
	
</style>';


}
?>
