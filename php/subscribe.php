<?php

include('database_connection.php');

if (isset($_POST) && !empty($_POST)) {

  // post data from index.js fetch API
  $user_ime = $_POST["ime"];
  $user_email = $_POST["email"];
  $user_kalorije = round($_POST["kalorije"]);
  $user_iskljucene_namirnice = $_POST["iskljucene_namirnice"];

  var_dump($user_iskljucene_namirnice);

  $query = "INSERT INTO korisnici (Ime,Email,Dnevno_kalorija,Iskljucene_namirnice) VALUES (:Ime, :Email, :Dnevno_kalorija, :Iskljucene_namirnice)";

  $statement = $connect->prepare($query);
  $statement->bindParam(':Ime', $user_ime, PDO::PARAM_STR);
  $statement->bindPAram(':Email', $user_email, PDO::PARAM_STR);
  $statement->bindPAram(':Dnevno_kalorija', $user_kalorije, PDO::PARAM_INT);
  $statement->bindPAram(':Iskljucene_namirnice', $user_iskljucene_namirnice, PDO::PARAM_STR);

  
  $statement->execute();
  
}
