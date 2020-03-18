<?php

include('database_connection.php');
if (isset($_POST)) {

  $user_ime = $_POST["ime"];
  $user_email = $_POST["email"];
  $user_kalorije = round($_POST["kalorije"]);
  echo $user_kalorije;

  $query = "INSERT INTO korisnici (Ime,Email,Dnevno_kalorija) VALUES (:Ime, :Email, :Dnevno_kalorija)";

  $statement = $connect->prepare($query);
  $statement->bindParam(':Ime', $user_ime);
  $statement->bindPAram(':Email', $user_email);
  $statement->bindPAram(':Dnevno_kalorija', $user_kalorije);

  $statement->execute();
  
}
