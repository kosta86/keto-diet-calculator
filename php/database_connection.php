
<?php


$connect = new PDO('mysql:host=localhost;dbname=keto', 'kosta86', 'kosta1986');

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>


