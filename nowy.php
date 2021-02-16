<html>
<head>
<title>Dodaj nowego użytkownika</title>
</head>
    <body>

<?php

include "autoryzacja.php";
 error_reporting(E_ALL);
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());


if($_POST['login']!="")
{
/*echo "INSERT INTO uzytkownik (imie, nazwisko, adres_mailowy, login, haslo, nr_telefonu) VALUES 
(
'".$_POST['imie']."',
'".$_POST['nazwisko']."',
'".$_POST['adres_mailowy']."',
'".$_POST['login']."',
'".$_POST['haslo']."',
'".$_POST['nr_telefonu']."'
)";
*/
mysqli_query
(


$conn, "INSERT INTO uzytkownik (imie, nazwisko, adres_mailowy, login, haslo, nr_telefonu) VALUES 
  (
'".$_POST['imie']."',
'".$_POST['nazwisko']."',
'".$_POST['adres_mailowy']."',
'".$_POST['login']."',
'".$_POST['haslo']."',
'".$_POST['nr_telefonu']."'
 )"
);
echo "Użytkownik został dodany do bazy.<br>";
echo "<a href=start.html>Powrót do strony głównej</a>";
}

else
{


?>



<form action="nowy.php" method="post">

Podaj imię: <input name="imie"><br>
Podaj nazwisko: <input name="nazwisko"><br>
Podaj adres mailowy: <input name="adres_mailowy"><br>
Podaj numer telefonu: <input name="nr_telefonu"><br>
Podaj nazwę użytkownika: <input name="login"><br>
Podaj hasło: <input name="haslo"><br> 


<input type="submit" value="Dodaj użytkownika">
</form>
<a href="start.html">Powrót do strony głownej</a>
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
	font-size:30px;
	margin-top: 2%;
}
</style>

<?php
}
?>
