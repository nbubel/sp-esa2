<?php
session_start();
require_once ('db.php');
require_once ('helper.php');

if (!($_SESSION["login"])){
?>

<?php head(); ?>
<body>
  <?php nav(); ?>

<div class="container">
  <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
    <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
    <h1>Login zum Onlineshop</h1>
    <p>Bitte loggen Sie sich mit Ihren Zugangsdaten ein.</p>
    <p>Einen Testzugang erhalten Sie mit dem Usernamen: "dlv" und dem Passwort "Rio2016"!</p>

    <form action="Session.php" method="post">

        Dein Username:<br>
        <input class="form-control" type="text" size="24" maxlength="50"
        name="username"><br><br>

        Dein Passwort:<br>
        <input class="form-control" type="password" size="24" maxlength="50"
        name="passwort"><br>

        <input class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred;" role='button' name="Send" type="submit" value="Login">
    </form>
  </div>
</div> <!-- /container -->


<?php bootstrapJs(); ?>


<?php
exit;
}



if ( ($_POST['name'] && $_POST['str'] && $_POST['plz'] && $_POST['mail'] && $_POST['tel'] && $_POST['alter'] && $_POST['nr'] && $_POST['size'] && $_POST['farbe']) != ""  && ($_POST['bedingung'] == "yes") && (check_plz_de($_POST['plz'])) )
{
?>
<?php head(); ?>
<body>
  <?php nav(); ?>

    <div class="container">
      <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
        <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
        <h1>Bestätigung Ihrer Bestellung</h1>
        <p>Vielen Dank für Ihre Bestellung. Wir werden diese umgehend bearbeiten.</p>
        <p>Wir überprüfen Sie Ihre Angaben. Sollte Ihnen ein Fehler unterlaufen sein, melden Sie sich bitte umgehend bei uns.</p>

        <form action="<?php echo$_SERVER['../PHP_SELF']; ?>" enctype="multipart/form-data" method="post" target="_self">
        <b>Vor- und Nachname:</b><input class="form-control" name="name" type="text" size="35" maxlength="50" value ="<?php echo ''.$_POST['name']; ?>"></br>
        <b>Straße und Hausnummer:</b><input class="form-control" name="str" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['str']; ?>"></br>
        <b>PLZ:</b><input class="form-control" name="plz" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['plz']; ?>"></br>
        <b>E-Mail-Adresse:</b><input class="form-control" name="mail" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['mail']; ?>"></br>
        <b>Telefon:</b><input class="form-control" name="tel" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['tel']; ?>"></br>
        <b>Alter:</b><input class="form-control" name="alter" type="text" size="35" maxlength="2" value="<?php echo ''.$_POST['alter']; ?>"></br>
        <b>Artikelnummer:</b><input class="form-control" name="nr" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['nr']; ?>"></br>
        <b>Größe:</b><select class="form-control" size="4" name="size">
        <option <?php  if ($_POST['size']== "S") echo "selected";?> value="S">S</option>
        <option <?php  if ($_POST['size']== "M") echo "selected";?> value="M">M</option>
        <option <?php  if ($_POST['size']== "L") echo "selected";?> value="L">L</option>
        <option <?php  if ($_POST['size']== "XL") echo "selected";?> value="XL">XL</option>
        </select>
        </br>
        <b>Farbe:</b><input class="form-control" name="farbe" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['farbe'] ?>"></br>
        <b>Anmerkung:</b></br><textarea name="anmerkung"  style="resize:none;width:100%;height:150px;"><?php echo ''.$_POST['anmerkung']; ?></textarea></br>
        </table>
        </form>

      </div>

    </div> <!-- /container -->


<<?php bootstrapJs(); ?>


<?php
$sql = "INSERT INTO bestellung (id, datum, anmerkung, userID, artikelID) VALUES (NULL , NULL, NULL,  NULL,  NULL)";

// Datenbank auswählen

$db_sel = mysql_select_db( MYSQL_DATENBANK )
    or die("Fehler bei der Datenübertragung");

// ausführen des mysql-Befehls
$db_erg = mysql_query( $sql );
if ( ! $db_erg )
{
  die('Ung&uuml;ltige Abfrage: ' . mysql_error());
}
exit;
}

if ( ($_POST['name'] == "" && $_POST['str']== "" && $_POST['plz']== "" && $_POST['mail']== "" && $_POST['tel']== "" && $_POST['alter']== "" && $_POST['nr']== "" && $_POST['size']== "" && $_POST['farbe']== "" && $_POST['bedingung'] != "yes" ))
{

?>

<?php head(); ?>
<body>
  <?php nav(); ?>

    <div class="container">
      <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
        <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
        <h1>Bestellformular</h1>
        <p>Sie sind Leichtathletik-Fan und wollen Ihre Stars hautnah erleben, oder gar die Kleidung der DLV-Mannschaft tragen? Dann sind Sie hier richtig.</p>
        <p>Sichern Sie sich jetzt über den leichtathletik.de Online-Shop die offizielle DLV-Mode der deutschen Leichtathletik-Mannschaft -  angefangen beim Rucksack, über T-Shirts bis hin zu den Trikots. Außerdem erhältlich: Das heiß begehrte T-Shirt zu den Deutschen Meisterschaften mit dem Sie immer eine gute Figur machen, egal ob Zuschauer oder Athlet. </p>

      </br><p><i>Bitte füllen Sie das Bestellformular komplett aus und akzeptieren Sie die AGBs!</i></p></br></br>
      <form action="<?php echo$_SERVER['../PHP_SELF']; ?>" enctype="multipart/form-data" method="post" target="_self">
      <b>Vor- und Nachname:</b><input class="form-control" name="name" type="text" size="35" maxlength="50" value ="<?php echo ''.$_POST['name']; ?>"></br>
      <b>Straße und Hausnummer:</b><input class="form-control" name="str" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['str']; ?>"></br>
      <b>PLZ:</b><input class="form-control" name="plz" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['plz']; ?>"></br>
      <b>E-Mail-Adresse:</b><input class="form-control" name="mail" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['mail']; ?>"></br>
      <b>Telefon:</b><input class="form-control" name="tel" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['tel']; ?>"></br>
      <b>Alter:</b><input class="form-control" name="alter" type="text" size="35" maxlength="2" value="<?php echo ''.$_POST['alter']; ?>"></br>
      <b>Artikelnummer:</b><input class="form-control" name="nr" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['nr']; ?>"></br>
      <b>Größe:</b><select class="form-control" size="4" name="size">
      <option <?php  if ($_POST['size']== "S") echo "selected";?> value="S">S</option>
      <option <?php  if ($_POST['size']== "M") echo "selected";?> value="M">M</option>
      <option <?php  if ($_POST['size']== "L") echo "selected";?> value="L">L</option>
      <option <?php  if ($_POST['size']== "XL") echo "selected";?> value="XL">XL</option>
      </select>
      </br>
      <b>Farbe:</b><input class="form-control" name="farbe" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['farbe'] ?>"></br>
      <b>Anmerkung:</b></br><textarea name="anmerkung"  style="resize:none;width:100%;height:150px;"><?php echo ''.$_POST['anmerkung']; ?></textarea></br>
      </br>
      <input class="form-control" style="display: inline-block; width: 50px;"   type="checkbox" name="bedingung" value="yes">Ja, ich erkenne die
      <a style="text-decoration:underline;" href="http://www.leichtathletik-shop.info/epages/62420778.sf/de_DE/?ObjectPath=/Shops/62420778/Categories/TermsAndConditions" target="_blank">AGBs</a> an.   <br><br><br>
      </br>
      <input class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred;" role='button' name="Send" type="submit" value="Jetzt kostenpflichtig bestellen!"></br>
      </table>
      </form>


      </div>

    </div> <!-- /container -->


<<?php bootstrapJs(); ?>


<?php
}

else
{

?>
<?php head(); ?>
<body>
  <?php nav(); ?>

    <div class="container">
      <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
        <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
        <h1>Bestellformular</h1>
        <p>Sie sind Leichtathletik-Fan und wollen Ihre Stars hautnah erleben, oder gar die Kleidung der DLV-Mannschaft tragen? Dann sind Sie hier richtig.</p>
        <p>Sichern Sie sich jetzt über den leichtathletik.de Online-Shop die offizielle DLV-Mode der deutschen Leichtathletik-Mannschaft -  angefangen beim Rucksack, über T-Shirts bis hin zu den Trikots. Außerdem erhältlich: Das heiß begehrte T-Shirt zu den Deutschen Meisterschaften mit dem Sie immer eine gute Figur machen, egal ob Zuschauer oder Athlet. </p>

      </br><p><i><span style="color: red;"><b>Bitte füllen Sie alle Formularfelder komplett aus und akzeptieren Sie die AGBs!</b></span></i></p></br></br>
      <form action="<?php echo$_SERVER['../PHP_SELF']; ?>" enctype="multipart/form-data" method="post" target="_self">
        <?php if (!(($_POST['name']) == '')){?>
            <b>Vor- und Nachname:</b><input class="form-control" name="name" type="text" size="35" maxlength="50" value ="<?php echo ''.$_POST['name']; ?>"></br>
        <?php
      } else {?>
          <span style="color: red;"><b>Vor- und Nachname:</b></span><input class="form-control" name="name" type="text" size="35" maxlength="50" value ="<?php echo ''.$_POST['name']; ?>"></br>
        <?php
      }?>


      <?php if (!(($_POST['str']) == '')){?>
          <b>Straße und Hausnummer:</b><input class="form-control" name="str" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['str']; ?>"></br>
      <?php
    } else {?>
        <span style="color: red;"><b>Straße und Hausnummer:</b></span><input class="form-control" name="str" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['str']; ?>"></br>
      <?php
    }?>


      <?php if (check_plz_de($_POST['plz']) == true){?>
          <b>PLZ:</b><input class="form-control" name="plz" type="text" size="35" maxlength="5" value="<?php echo ''.$_POST['plz']; ?>"></br>
      <?php
    } else {?>
        <span style="color: red;"><b>PLZ:</b></span><input class="form-control" name="plz" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['plz']; ?>"></br>
      <?php
    }?>


      <?php if (!(($_POST['mail']) == '')){?>
          <b>E-Mail-Adresse:</b><input class="form-control" name="mail" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['mail']; ?>"></br>
      <?php
    } else {?>
        <span style="color: red;"><b>E-Mail-Adresse:</b></span><input class="form-control" name="mail" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['mail']; ?>"></br>
      <?php
    }?>

    <?php if (!(($_POST['tel']) == '')){?>
        <b>Telefon:</b><input class="form-control" name="tel" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['tel']; ?>"></br>
    <?php
  } else {?>
      <span style="color: red;"><b>Telefon:</b></span><input class="form-control" name="tel" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['tel']; ?>"></br>
    <?php
  }?>

  <?php if (!(($_POST['alter']) == '')){?>
      <b>Alter:</b><input class="form-control" name="alter" type="text" size="35" maxlength="2" value="<?php echo ''.$_POST['alter']; ?>"></br>
  <?php
} else {?>
    <span style="color: red;"><b>Alter:</b></span><input class="form-control" name="alter" type="text" size="35" maxlength="2" value="<?php echo ''.$_POST['alter']; ?>"></br>
  <?php
}?>

<?php if (!(($_POST['nr']) == '')){?>
    <b>Artikelnummer:</b><input class="form-control" name="nr" type="text" size="35" maxlength="10" value="<?php echo ''.$_POST['nr']; ?>"></br>
<?php
} else {?>
  <span style="color: red;"><b>Artikelnummer:</b></span><input class="form-control" name="nr" type="text" size="35" maxlength="10" value="<?php echo ''.$_POST['nr']; ?>"></br>
<?php
}?>

<?php if (!(($_POST['size']) == '')){?>
  <b>Größe:</b><select class="form-control" size="4" name="size">
  <option <?php  if ($_POST['size']== "S") echo "selected";?> value="S">S</option>
  <option <?php  if ($_POST['size']== "M") echo "selected";?> value="M">M</option>
  <option <?php  if ($_POST['size']== "L") echo "selected";?> value="L">L</option>
  <option <?php  if ($_POST['size']== "XL") echo "selected";?> value="XL">XL</option>
  </select>
  </br>
<?php
} else {?>
  <span style="color: red;"><b>Größe:</b></span><select class="form-control" size="4" name="size">
  <option <?php  if ($_POST['size']== "S") echo "selected";?> value="S">S</option>
  <option <?php  if ($_POST['size']== "M") echo "selected";?> value="M">M</option>
  <option <?php  if ($_POST['size']== "L") echo "selected";?> value="L">L</option>
  <option <?php  if ($_POST['size']== "XL") echo "selected";?> value="XL">XL</option>
  </select>
  </br>
<?php
}?>
<?php if (!(($_POST['farbe']) == '')){?>
    <b>Farbe:</b><input class="form-control" name="farbe" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['farbe'] ?>"></br>
<?php
} else {?>
  <span style="color: red;"><b>Farbe:</b></span><input class="form-control" name="farbe" type="text" size="35" maxlength="50" value="<?php echo ''.$_POST['farbe'] ?>"></br>
<?php
}?>


      <b>Anmerkung:</b></br><textarea name="anmerkung"  style="resize:none;width:100%;height:150px;"><?php echo ''.$_POST['anmerkung']; ?></textarea></br>
      </br>

      <?php if (!(($_POST['bedingung']) == '')){?>
        <input class="form-control" style="display: inline-block; width: 50px;"   type="checkbox" name="bedingung" value="yes" <?php if (!(($_POST['bedingung']) == '')) echo "checked='checked'";?> >Ja, ich erkenne die
        <a style="text-decoration:underline;" href="http://www.leichtathletik-shop.info/epages/62420778.sf/de_DE/?ObjectPath=/Shops/62420778/Categories/TermsAndConditions" target="_blank">AGBs</a> an.   <br>
      <?php
      } else {?>
        <span style="color: red;"><input class="form-control" style="display: inline-block; width: 50px;"   type="checkbox" name="bedingung" value="yes" <?php if (!(($_POST['bedingung']) == '')) echo "checked='checked'";?> >Ja, ich erkenne die
        <a style="text-decoration:underline;" href="http://www.leichtathletik-shop.info/epages/62420778.sf/de_DE/?ObjectPath=/Shops/62420778/Categories/TermsAndConditions" target="_blank">AGBs</a> an.</span>   <br>
      <?php
      }?>

      </br>
      <input class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred;" role='button' name="Send" type="submit" value="Jetzt kostenpflichtig bestellen!"></br>
      </table>
      </form>


      </div>

    </div> <!-- /container -->


  <<?php bootstrapJs(); ?>

<?php
}
?>
</body>
</html>

<?php

    function check_plz_de($plz){
      if(!preg_match('/^\d{5}$/',$plz)) return false;
      //$url = 'http://ws.geonames.org/postalCodeLookupJSON?postalcode='.$plz.'&country=DE';
      //$response = file_get_contents($url);
      //$resp_arr = json_decode($response,true);
      //$rw = isset($resp_arr["postalcodes"]) && count($resp_arr["postalcodes"]) >= 1;
      //echo "" + $rw;
      return true;
    }
?>
