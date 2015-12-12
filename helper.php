<?php
require_once ('User.php');
require_once ('Artikel.php');
require_once ('Bestellung.php');


function getUserName($userx){
  return "User ".$userx->name;
}

function getArtikelSize($artx){
  return "Artikelsize: ".$artx->groesse;
}


function head(){
  echo"
<!DOCTYPE html>
<html lang='de'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Bestellformular - Deutscher Leichtathletik-Verband Fanshop</title>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <!--[if lt IE 9]>
          <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
          <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->

         <!-- Besondere Stile für diese Vorlage -->
         <link href='css/navbar-fixed-top.css' rel='stylesheet'>

         <!-- Nur für Testzwecke. Kopiere diese Zeilen nicht in echte Projekte! -->
         <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
         <script src='js/ie-emulation-modes-warning.js'></script>

         <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
         <!--[if lt IE 9]>
           <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
           <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
         <![endif]-->

    </head>";
  }

function nav(){
  echo "
  <!-- Fixierte Navbar -->
   <nav class='navbar navbar-default navbar-fixed-top'>
     <div class='container'>
       <div class='navbar-header'>
         <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
           <span class='sr-only'>Navigation ein-/ausblenden</span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
         </button>
         <a class='navbar-brand' href='#'>leichtathletik.de-Fanshop</a>
       </div>
       <div id='navbar' class='navbar-collapse collapse'>
         <ul class='nav navbar-nav'>
          <li><a href='index.php'>1. Login</a></li>
          <li><a href='shop.php'>2. Artikel wählen</a></li>
          <li><a href='index.php'>3. Bestellung abschließen</a></li>
          <li><a href='index.php'>4. Bestätigung anzeigen</a></li>
           <li><a href='Logout.php'>5. Logout</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
   </nav>";
    }



   function bootstrapJs(){
     echo "
   <!-- Bootstrap-JavaScript
   ================================================== -->
   <!-- Am Ende des Dokuments platziert, damit Seiten schneller laden -->
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
   <script src='js/bootstrap.min.js'></script>";
}

 ?>
