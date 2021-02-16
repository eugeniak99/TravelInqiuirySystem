<html>
<head>
<title>Wyszukaj obiekt</title>
</head>
    <body>
<form method="post" action="lista_obiektow.php">
<input type="text" name="phrase">
<input type="submit" name="submit" value="Szukaj">
</form>

<?php
include "autoryzacja.php";


echo'<h2>Wyniki wyszukiwania</h2>';


$_POST['phrase']=trim($_POST['phrase']);
// sprawdzenie, czy użytkownik wpisał dane
if(empty($_POST['phrase']))
{
	echo "Nie podałeś żadnego miasta! Zapoznaj się z listą wszystkich obiektów lub wpisz miasto do wyszukania";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
					or die("Błąd połączenia z bazą");  
echo '<table border="1">';

echo '<tr>';
     echo '<td><b><center>Kraj</center></b></td><td><b><center>Miasto</center></b></td><td><b><center>Adres</center></b></td><td><b><center>Cena za noc</center></b></td>';
echo '</tr>';

$result = mysqli_query($conn, "SELECT * from obiekt;");
while ($row = mysqli_fetch_array($result)) 
    {
        
        
         echo '<tr>';
        
        echo '<td>'.$row['kraj']. '</td>'.'<td>' .$row ['miasto']. '</td>'.'<td>'.$row['adres'].'</td>'.'<td>'.$row['cena_noc'].'</td>';
        
        echo '</tr>';
    }    

    
    echo '</table>';
}
else
{

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
					or die("Błąd połączenia z bazą");  
$query="SELECT kraj, miasto, adres, cena_noc FROM obiekt WHERE miasto LIKE '%{$_POST['phrase']}%' OR kraj LIKE '%{$_POST['phrase']}%' OR adres LIKE '%{$_POST['phrase']}%'";

$result=mysqli_query($conn,$query);
// ustalenie ilości wyszukanych obiektów
$obAmount=mysqli_num_rows($result);
// wyswietlenie ilości wyszukanych obiektów
echo'Znaleziono: '.$obAmount.'<br /><br />';
// wyświetlenie wyników w pętli
for($x=0;$x<$obAmount;$x++)
{
// przekształcenie danych na tablicę
$row=mysqli_fetch_assoc($result);
// wyświetlenie numeru identyfikacyjnego
echo $x+1;
echo '. ';
// wyświetlenie nazwy produktu
echo '<table border=1>';

echo '<tr>';
     echo '<td><b><center>Kraj</center></b></td><td><b><center>Miasto</center></b></td><td><b><center>Adres</center></b></td><td><b><center>Cena za noc</center></b></td>';
echo '</tr>';

echo '<td>'.$row['kraj'].'</td><td>'.$row['miasto'].'</td><td>'.$row['adres'].'</td><td>'. $row['cena_noc'].'</td>';

echo '</table>';
echo'<br />';
}
}
echo '<style>

body

{
	background-image:url("embossed-diamond.png");
	text-align: 25px;
}
table
{
	border-collapse: collapse;
	font-size: 20px;
	background-color:white;
}
input
{
	font-size: 20px;
}
</style>';
?>
<a href="logowanie.php">Powrót do strony logowania</a>
</body>
</html>


<!--if (isset($_GET['submit'])){
	mysql_connect('localhost', 'user', 'password') or die(mysql_error());
	mysql_select_db('baza') or die(mysql_error());
	$keyword = "";
	if(isset($_GET['word'])) {
	   $keyword = $_GET['word'];
	}
	print "Wyniki wyszukiwania";
	$sql = "SELECT * FROM tabela WHERE title LIKE '%$keyword%' OR article LIKE '%$keyword%'";
	$result = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($result)){
		print '<br /><a href="szukaj.php?id=' 
		. $row['id'] . '">'
		. $row['title'] . '</a>';
	}
	if(mysql_num_rows($result)==0){
	print "Brak wynikow!";
	}
}
else{
	print "Wpisz slowo które chcesz wyszukac.";
}
?>









