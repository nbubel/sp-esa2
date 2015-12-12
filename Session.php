<?php
session_start();
require_once ('db.php');
require_once ('User.php');
require_once ('helper.php');

mysql_select_db( MYSQL_DATENBANK ) or die ("Datenbank konnte nicht ausgewählt werden");

$formUsername = $_POST["username"];
$formPasswort = $_POST["passwort"];

$abfrage = "SELECT userID, benutzername, passwort, name, str, plz, mail, tel, age FROM user WHERE benutzername LIKE '$formUsername' LIMIT 1";
$ergebnis = mysql_query($abfrage) OR die("Error: $abfrage <br>".mysql_error());
$row = mysql_fetch_object($ergebnis);

$_SESSION['User'] = new User($row->name,$row->userID,$row->benutzername,$row->passwort,$row->str,$row->plz,$row->mail,$row->tel,$row->age,false);
$_SESSION['Username'] = $_SESSION['User']->name;
$_SESSION['Userstr'] = $_SESSION['User']->str;
$_SESSION['Userplz'] = $_SESSION['User']->plz;
$_SESSION['Usermail'] = $_SESSION['User']->mail;
$_SESSION['Usertelefon'] = $_SESSION['User']->telefon;
$_SESSION['Userage'] = $_SESSION['User']->age;
$_SESSION['UserID'] = $_SESSION['User']->kundennummer;
?>

<?php head(); ?>
<body>
  <?php nav(); ?>

<div class="container">
  <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
    <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
    <h1>Login zum Onlineshop</h1>


<?php

    if($_SESSION["User"]->passwort == $formPasswort && $formPasswort !="" )
        {
        $_SESSION["login"] = true;?>
        <p>Der Login war erfolgreich.</p>;
        <p class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred; color: white;"><a style="color:white; text-decoration: none;" href="shop.php">Zum Shop</a></p>;
        <?php
        }
    else
        {?>
        <p>Benutzername und/oder Passwort waren falsch.</p>;
        <p class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred; color: white;"><a style="color:white; text-decoration: none;" href="index.php">Zum Login</a></p>";
        <?php } ?>

        </div>
      </div> <!-- /container --><<?php bootstrapJs(); ?></body></html>
