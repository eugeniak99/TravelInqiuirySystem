<html>
<head>

<meta charset="utf-8">
</head>
<body>
<a href="logowanie.php">Powrót do strony logowania</a>
<form action="edycja_uzytkownik.php" method="POST">
Podaj nowe imię: <input type="text" name="nowe_imie"><br>
Podaj nowe nazwisko: <input type="text" name="nowe_nazwisko"><br>
Podaj nowy adres mailowy: <input type="text" name="nowy_adres_mailowy"><br>
Podaj nowy numer telefonu:<input type="text" name="nowy_numer"><br>
Podaj nowy login :<input type="text" name="nowy_login"><br>
Podaj nowe hasło: <input type="text" name="nowe_haslo"><br>

    <input type="hidden" name="id_uzytkownika" value="'.$_GET['id_uzytkownika'].'">
    <br>
<input type="submit" name="edytuj" value="Zatwierdź zmiany">
</form>
<?php


 include "autoryzacja.php";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die("Błąd połączenia z bazą");   

 $nowe_imie=$_POST['nowe_imie'];
 $nowe_nazwisko=$_POST['nowe_nazwisko'];
$nowy_adres_mailowy=$_POST['nowy_adres_mailowy'];
$nowy_numer=$_POST['nowy_numer'];
$nowy_login=$_POST['nowy_login'];
$nowe_haslo=$_POST['nowe_haslo'];
$id=$_GET['id_uzytkownik'];
echo $id;



								if ($nowe_imie)
								{
									
								echo "UPDATE uzytkownik SET imie='$nowe_imie' WHERE id_uzytkownik=$_GET['id_uzytkownik'];";
									mysqli_query($conn, "UPDATE uzytkownik SET imie='$nowe_imie' WHERE id_uzytkownik=$_GET['id_uzytkownik'];");

									
								}
								if ($nowe_nazwisko)
								{
									
									
									mysqli_query($conn, "UPDATE uzytkownik SET nazwisko='$nowe_nazwisko' WHERE id_uzytkownik=".$_GET['id_uzytkownik'].";");
									
								}
								if ($nowy_adres_mailowy)
								{
									mysqli_query($conn, "UPDATE uzytkownik SET adres_mailowy='$nowy_adres_mailowy' WHERE id_uzytkownik LIKE ".$_GET['id_uzytkownik'].";");
									
								}
                                if ($nowy_numer)
								{
									mysqli_query($conn, "UPDATE uzytkownik SET nr_telefonu='$nowy_numer' WHERE id_uzytkownik=".$_GET['id_uzytkownik'].";");
									
								}
								if ($nowy_login)
								{
									mysqli_query($conn, "UPDATE uzytkownik SET login='$nowy_login' WHERE id_uzytkownik=".$_GET['id_uzytkownik'].";");
									
								}
								if ($nowe_haslo)
								{
									mysqli_query($conn, "UPDATE uzytkownik SET haslo='$nowe_haslo' WHERE id_uzytkownik=".$_GET['id_uzytkownik'].";");
									
								}

echo '<style>
form
{
	text-align:center;
	font-size: 25px;
background-color:#0099CC;
	border:2px solid blue;
	border-radius:50px;
	
	padding: 100px;
}
 input
 {
	 font-size:20px;
	 margin-top: 2%;
 }
body
{
	background-image: url("embossed-diamond.png");
}


</style>';
?>



</body>
</html>