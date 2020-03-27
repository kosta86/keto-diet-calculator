<?php
include_once('database_connection.php');

$query_array = parse_str($_SERVER['QUERY_STRING'], $vars);
$user_id = filter_var($vars['id'], FILTER_VALIDATE_INT);

if ($user_id) {

  var_dump($user_id);

  $query = "SELECT dan FROM korisnici WHERE id = ':user_id' ";

  $statement = $connect->prepare($query);
  $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

  $statement->execute();
  
} else {
  echo 'noquery string';
}
