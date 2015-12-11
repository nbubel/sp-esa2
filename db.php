<?php

define ( 'MYSQL_HOST', 'localhost' );
define ( 'MYSQL_BENUTZER', 'd0201a2d' );
define ( 'MYSQL_KENNWORT', '2VkKDRP2mJFx3h5x' );
define ( 'MYSQL_DATENBANK', 'd0201a2d' );
$db_link = @mysql_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
if ( ! $db_link )
{

die('keine Verbindung zur Zeit möglich - später probieren ');
}
?>
