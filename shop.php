<?php
session_start();
require_once ('db.php');
require_once ('User.php');
require_once ('Artikel.php');
require_once ('Bestellung.php');
require_once ('helper.php');
?>

<?php

$db_link = mysqli_connect (
                     MYSQL_HOST,
                     MYSQL_BENUTZER,
                     MYSQL_KENNWORT,
                     MYSQL_DATENBANK
                    );

$artikelliste = array();

$sql = "SELECT artikelID, name, groesse, farbe, bild, online FROM artikel";
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}

?>

<?php head(); ?>
<body>
  <?php nav(); ?>

<div class="container">
  <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
    <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
    <h1>Artikel für die Bestellung auswählen!</h1>


<?php
echo "<table>";

while ($row = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  /*echo "<tr>";
  echo "<td>". $row['artikelID'] . "</td>";
  echo "<td>". $row['name'] . "</td>";
  echo "<td>". $row['groesse'] . "</td>";
  echo "<td>". $row['farbe'] . "</td>";
  echo "<td>". $row['bild'] . "</td>";
  echo "<td>". $row['online'] . "</td>";
  echo "</tr>";*/
  $artikel = new Artikel($row['artikelID'],$row['name'],$row['groesse'],$row['farbe'],$row['bild'],$row['online']);
  array_push($artikelliste, $artikel);
}
echo "</table>";?>

<p>Bitte wählen Sie aus der Liste den Artikel, den Sie bestellen möchten.</p><p>

<?php
$artikelmenge = sizeof($artikelliste);
$art = Artikel;
?>

</p>
<form action="index.php" method="post">
<!--<b>Artikelnummer:</b>--><select class="form-control" size="<?php echo "{$artikelmenge}"; ?>" name="nr" required>
<?php

 for ($i=0; $i < $artikelmenge; $i++) {
   $art = $artikelliste[$i];
   echo "<option  value='".$art->artikelnummer. "'>".$art. "</option>";
 }
?>

</select>
<br>
<input class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred; color: white;" type="submit" value="Zur Bestellung">
</form>



<?php
$_SESSION["artikelliste"] = $artikelliste;?>

        </div>
      </div> <!-- /container --><<?php bootstrapJs(); ?></body></html>
