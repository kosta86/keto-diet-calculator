<?php

include('database_connection.php');

$post_ime = $_POST["ime"];
$post_email = $_POST["email"];
$post_kalorije = $_POST["kalorije"];
echo $post_kalorije;

$query = "INSERT INTO korisnici (Ime,Email) VALUES (:Ime, :Email)";

$statement = $connect->prepare($query);
$statement->bindParam(':Ime', $post_ime);
$statement->bindPAram(':Email', $post_email);

$statement->execute();

