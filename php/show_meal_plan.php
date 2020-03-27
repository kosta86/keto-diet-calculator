<?php
include_once('database_connection.php');
include_once('create_meal_plan.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $query_array = parse_str($_SERVER['QUERY_STRING'], $vars);
    $user_id = filter_var($vars['id'], FILTER_VALIDATE_INT);

    /* if ($user_id) { */

    var_dump($user_id);
    
    //get user data from DB
    function user_db_data($connect, $user_id) {
        
        $query = "SELECT * FROM korisnici WHERE id=:id ";

        $statement = $connect->prepare($query);
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

        $statement->execute();

        $found_rows = $statement->fetch();

        $ime = $found_rows[1];
        $email = $found_rows[2];
        $kalorije = $found_rows[3];
        $dan = $found_rows[4];
        $upotrebljeni_recepti = $found_rows[5];

        $user_data['ime'] = $ime;
        $user_data['email'] = $email;
        $user_data['kalorije'] = $kalorije;
        $user_data['dan'] = $dan;
        $user_data['upotrebljeni_recepti'] = $upotrebljeni_recepti;
        
        return $user_data;
    }

    $user_data = user_db_data($connect, $user_id);

    //make daily meal plan
    function daily_plan() {



    }
    
    $query = "UPDATE korisnici SET dan=dan+1 WHERE id=$user_id";
    $statement = $connect->prepare($query);
    $statement->execute();

    var_dump($found_rows[4]);
} else {
    echo 'noquery string';
}
