<?php
include_once('database_connection.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $query_array = parse_str($_SERVER['QUERY_STRING'], $vars);
    $user_id = filter_var($vars['id'], FILTER_VALIDATE_INT);

    /* if ($user_id) { */

    var_dump($user_id);

    $query = "SELECT * FROM korisnici WHERE id=:id ";

    $statement = $connect->prepare($query);
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

    $statement->execute();

    $found_rows = $statement->fetch();

    $dan = $found_rows[4];
    
    $query = "UPDATE korisnici SET dan=concat(dan,dan-(dan+1)) WHERE id=$user_id";
    $statement = $connect->prepare($query);
    $statement->execute();

    var_dump($found_rows[4]);
} else {
    echo 'noquery string';
}
