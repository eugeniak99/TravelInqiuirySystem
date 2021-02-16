<html>
<head>
<title>Dodawaj i przeglądaj rezerwacje</title>
</head>
<meta charset="utf-8">
<a href="logowanie.php">Powrót do strony logowania</a>
<form action="rezerwacje.php" method="POST">
            <label>Wybierz obiekt do rezerwacji </label><br>
			<select name="wybierz_obiekt" required>
				<option value="">-----------------</option>



<?php

include "autoryzacja.php";
					$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
					or die("Błąd połączenia z bazą");  
   
   
   
   
   $result=mysqli_query($conn,"SELECT * FROM obiekt WHERE id_uzytkownik NOT LIKE ".$_GET['id_uzytkownik'].";");
	
					$id=$_POST['id_obiekt'];


					while($row=mysqli_fetch_array($result))
					{
						echo "<option value='$row[0]'>$row[1] $row[2] $row[3] $row[4]</option>";
           
					 }

			echo '</select>';
echo '<br>
	
	
Podaj datę początku pobytu: <input name="data_od"><br>
Podaj datę końca pobytu: <input name="data_do"><br>
<input type="hidden" name="id_uzytkownik" value="'.$_GET['id_uzytkownik'].'">
    <br>

<input type="submit" name="Rezerwuj" value="Potwierdź rezerwację">';

echo '</form>';

echo '<br>';
echo '<h1>Lista moich rezerwacji</h1>';
$result=mysqli_query($conn,"SELECT nr_rezerwacji, data_od, data_do, obiekt.kraj, obiekt. miasto, obiekt.adres FROM rezerwacja JOIN obiekt on rezerwacja.id_obiekt=obiekt.id_obiekt WHERE rezerwacja.id_uzytkownik=".$_GET['id_uzytkownik'].";");


echo '<table border=1>';
						echo '<tr>';
     echo '<td><b><center>Nr rezerwacji</center></b></td> <td><b><center>Data przyjazdu</center></b></td><td><b><center>Data wyjazdu</center></b></td><td><b><center>Kraj</center></b></td><td><b><center>Miasto</center></b></td><td><b><center>Adres</center></b></td>';
echo '</tr>';
while($row=mysqli_fetch_array($result))
					{
						echo '<tr>';
        
        echo '<td>'.$row['nr_rezerwacji']. '</td>'.'<td>' .$row ['data_od']. '</td>'.'<td>'.$row['data_do']. '</td>'. '<td>'.$row['kraj']. '</td>'.'<td>' .$row ['miasto']. '</td>'.'<td>' .$row ['adres']. '</td>';
        
        echo '</tr>';
					}
	

$id_wybrane=$_POST['wybierz_obiekt'];

/*echo "INSERT INTO rezerwacja (data_od, data_do, id_uzytkownik, id_obiekt) VALUES 
(

'".$_POST['data_od']."',
'".$_POST['data_do']."',
".$_POST['id_uzytkownik'].",
$id_wybrane


)"; 
*/
$zapytanie="INSERT INTO rezerwacja (data_od, data_do, id_uzytkownik, id_obiekt) VALUES 
(

'".$_POST['data_od']."',
'".$_POST['data_do']."',
".$_POST['id_uzytkownik'].",
$id_wybrane


)"; 

mysqli_query($conn, $zapytanie);
echo '<style>
form
{
	text-align:center;
	font-size: 25px;
background-color:#99CCFF;
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
table
{
	border-collapse: collapse;
	background-color: white;
	font-size: 20px;
}



</style>';

?>
</body>
</html>

























