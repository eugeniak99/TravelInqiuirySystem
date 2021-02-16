<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <head>
<title>Usuwaj i edytuj obiekty</title>
</head>
</head>
<body>
<a href="logowanie.php">Powrót do strony logowania</a>
<form id="usuwaj" action="usun_obiekt.php" method="POST">
            <label>Wybierz obiekt do usuwania </label><br>
				<select name="usun_osobe" required>
				<option value="">Usuń</option>

				<?php
					include "autoryzacja.php";
					$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
					or die("Błąd połączenia z bazą");  
   
   

					$result=mysqli_query($conn,"SELECT * FROM obiekt WHERE id_uzytkownik LIKE ".$_GET['id_uzytkownik'].";");
	
					$id=$_POST['id_obiekt'];


					while($row=mysqli_fetch_array($result))
					{
						echo "<option value='$row[0]'>$row[1] $row[2] $row[3] $row[4]</option>";
           
					 };
				?>
				</select><br>
			
				<input type="submit" name="usun" value="Potwierdź usuwanie">

					<?php

						$delete=$_POST['usun_osobe'];
						$usuwamy="DELETE FROM obiekt WHERE id_obiekt=$delete";

						mysqli_query($conn,$usuwamy);
						/*echo "<br>Dany obiekt został usunięty z bazy<br>";*/

					?>

</form>
<form id="edytuj" action="usun_obiekt.php" method="POST">
				<label>Wybierz obiekt do edycji </label><br>
				

							<select name="edytuj_obiekt" required>
							<option value="">Edytuj</option>

							<?php

								$result=mysqli_query($conn,"SELECT * FROM obiekt WHERE id_uzytkownik LIKE ".$_GET['id_uzytkownik'].";");

								while($row=mysqli_fetch_array($result))
								{
									echo "<option value='$row[0]'>$row[1] $row[2] $row[3] $row[4]</option>";
           
								 };
								?>
							</select><br>
						
							<label for="kraj">Kraj</label><input type="text" name="nowykraj"><br>
							<label for="miasto">Miasto<input type="text" name="nowe_miasto"><br>
							<label for="adres">Adres</label><input type="text" name="nowy_adres"><br>
							<label for="cena_noc">Cena za noc</label><input type="text" name="nowa_cena"><br>

						
						<input type="submit" name="edytuj" value="Zatwierdź zmiany"><br>
		
						
						</form>
						
							<?php
								$edit=$_POST['edytuj_obiekt'];

								 $nowy_kraj=$_POST['nowy_kraj'];
								 $nowe_miasto=$_POST['nowe_miasto'];
								 $nowy_adres=$_POST['nowy_adres'];
								 $nowa_cena=$_POST['nowa_cena'];

								if ($nowy_kraj)
								{
									mysqli_query($conn, "UPDATE obiekt SET kraj='$nowy_kraj' WHERE id_obiekt=$edit;");
									
								}
								if ($nowe_miasto)
								{
									mysqli_query($conn, "UPDATE obiekt SET miasto='$nowe_miasto' WHERE id_obiekt=$edit;");
									
								}
								if ($nowy_adres)
								{
									mysqli_query($conn, "UPDATE obiekt SET adres='$nowy_adres' WHERE id_obiekt=$edit;");
									
								}
                                if ($nowa_cena)
								{
									mysqli_query($conn, "UPDATE obiekt SET cena_noc='$nowa_cena' WHERE id_obiekt=$edit;");
									
								}


    
							?>
	<style>

#edytuj
{
	background-color: yellow;
	border:2px solid blue;
	border-radius:50px;
	margin: 6% 10% 10% 50%;

	padding: 50px;
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
	width:30%;
}

#usuwaj
{
	background-color: pink;
	border:2px solid blue;
	border-radius:50px;
	
	padding: 100px;
}
select
{
	font-size:20px;
}

body
{
	background-image:url("embossed-diamond.png");
}
select
{
	width: 50%;


}



</style>	
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

</body>
</html>

