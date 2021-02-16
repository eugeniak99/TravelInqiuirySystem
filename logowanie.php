<html>
<head>
<title>Zaloguj się</title>
</head>
<meta charset="utf-8">
<body>
<a href="start.html">Powrót do strony startowej</a>
<?php
    include "autoryzacja.php";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die("Błąd połączenia z bazą");   


if(($_POST['login']!="")||($_GET['id_uzytkownik']!=""))
{   
        if($_GET['id_uzytkownik']!="")
        {
        
        $result=mysqli_query($conn, "SELECT * FROM uzytkownik WHERE id_uzytkownik=".$_GET['id_uzytkownik'].";"); 
    
        }
        else
    {
        $result=mysqli_query($conn, "SELECT * FROM uzytkownik WHERE login='".$_POST['login']."' AND haslo='".$_POST['haslo']."';"); 
    
        $rekord=mysqli_fetch_array($result);
        
        if($rekord['login']!="") //if(mysqli_num_rows($result)>0)
            {
				echo '<div id="powitanie">';
                echo "<br> Witaj, ".$rekord['imie']." ".$rekord['nazwisko']."<br>";
               echo '</div>';
                echo 
'<html>
<meta charset="utf-8">
<body>
<div id="navcontainer">
<ul id="navlist">

<li><a href="lista_obiektow.php">Wyszukaj obiekt</a></li>
<li><a href="dodaj_obiekt.php?id_uzytkownik='.$rekord['id_uzytkownik'].'">Dodaj obiekt</a></li>
<li><a href="usun_obiekt.php?id_uzytkownik='.$rekord['id_uzytkownik'].'">Usuwaj lub edytuj swoje obiekty</a></li>
<li><a href="rezerwacje.php?id_uzytkownik='.$rekord['id_uzytkownik'].'">Dodawaj i wyświetlaj swoje rezerwacje</a></li>
<li><a href="start.html">Powrót na stronę początkową</a></li>


</ul>
</div>

<style>
#navcontainer
{
text-align:center;
margin:auto;
}

#navlist
{
margin: 4% 50% 1% 2%;
padding: 0 1px 1px;
margin-left: 0;
font: bold 30px Verdana, sans-serif;
background: gray;
width: 13em;
text-align:center;
display:table-cell;
vertical-align:middle;




   list-style: none;
   margin: 0;
   padding: 0;
   position: relative;

   text-align: center;
width:100%;
}

#navlist li
{
list-style: none;
margin: 0;
border-top: 1px solid gray;
text-align: center;
margin:auto;


}

#navlist li a
{
display: block;
padding: 0.25em 0.5em 0.25em 0.75em;
border-left: 1em solid #AAB;
background: #CCD;
text-decoration: none;
margin: auto;
}

#navlist li a:link { color: #448; }
#navlist li a:visited { color: #667; }

#navlist li a:hover
{
border-color: #FE3;
color: #FFF;
background: #332;
}
body
{
background-image: url("united-squares-negative.png");
}
#powitanie
{
	width:30%;
	background-color:#FFCCBC;
	border:2px solid blue;
	border-radius:50px;
	margin: auto;
	margin-top: 1%;
	margin-left: 1%;
	margin-bottom: 2%;
	padding: 50px;
	font-size:25px;
	font-style: oblique;
}

</style>
</html>';

            }
        
        else 
            echo "nazwa uzytkownika i haslo nie są zgodne";
    } 
}
    
else
{
echo '<form id="logowanko" action="logowanie.php" method="post">  
        Podaj nazwę użytkownika: <br> <input name="login"> <br>
        Podaj hasło: <br> <input type="password" name="haslo"> <br>
        <input type="submit" value="Zaloguj się">
    </form>';
echo '<style>
body
{
background-image: url("united-squares-negative.png");
}
form
{
	font-size:15px;
	text-align:left;
	margin-top: 10%;
	width:30%;
	background-color:#E57373;
	border:2px solid blue;
	border-radius:50px;
	margin: auto;
	margin-top: 10%;
	margin-left: 30%;
	padding: 50px;
	font-size:25px;
	
}
input
{
	margin:1%;
	font-size: 15px;
}
</style>';
}
/*<li><a href="edycja_uzytkownik.php?id_uzytkownik='.$rekord['id_uzytkownik'].'">Edytuj dane użytkownika</a></li>
*/

?>
</body>
</html>


