<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
require_once ('db.php');
require_once ('User.php');
require_once ('helper.php');
?>

<?php head(); ?>
<body>
  <?php nav(); ?>

<div class="container">
  <div class="jumbotron" style="padding-right: 15px;padding-left: 15px;">
    <img style="width: 100%;" src="http://www.leichtathletik-shop.info/WebRoot/Store22/Shops/62420778/MediaGallery/banner_shop.jpg?CachePrevention=1447671124">
    <h1>Login zum Onlineshop</h1>

        <p>Sie sind ausgelogt.</p>;
        <p class='btn btn-lg btn-primary' style="background-color: red;border-color: darkred; color: white;"><a style="color:white; text-decoration: none;" href="index.php">Zum Anmelden</a></p>;

        </div>
      </div> <!-- /container --><<?php bootstrapJs(); ?></body></html>
