<?php
include_once("database_connection.php");



// get query strings and recipies
$query_strings_json = file_get_contents("php://input");
$recepti_json = file_get_contents("../json_recepti/recepti.json");

//convert json data to iterable data
$query = json_decode($query_strings_json);
$recepti = json_decode($recepti_json);

$query_id = $query->id;
/* $query_dan = $query->dan; */


if ($query_id) {
  //get user data from DB
  function user_db_data($connect, $query_id)
  {
    try {
      $query = "SELECT * FROM korisnici WHERE id=:id ";

      $statement = $connect->prepare($query);
      $statement->bindParam(':id', $query_id, PDO::PARAM_INT);

      $statement->execute();

      $found_rows = $statement->fetch();


      $ime = $found_rows[1];
      $email = $found_rows[2];
      $kalorije = $found_rows[3];
      $iskljucene_namirnice = $found_rows[4];
      $dan = $found_rows[5];
      $upotrebljeni_recepti = $found_rows[6];

      $user_data['ime'] = $ime;
      $user_data['email'] = $email;
      $user_data['kalorije'] = $kalorije;
      $user_data['dan'] = $dan;
      $user_data['upotrebljeni_recepti'] = explode(',', $upotrebljeni_recepti);
      $user_data['iskljucene_namirnice'] = explode(',', $iskljucene_namirnice);

      // if id not in db send error and die
      if ($found_rows == false) {

        $false_id = new stdClass;
        $false_id->error = "false_id";
        $false_id = json_encode($false_id);
        echo $false_id;

        die();
      }

    } catch (Exception $e){
      var_dump($e);
    }
    


    return $user_data;
  }
  $user_data = user_db_data($connect, $query_id);


  //*******************check if sebscription period is over************************
  if ($user_data['dan'] <= 7) {

    //make daily meal plan
    function daily_plan($user_data, $recepti)
    {


      function make_default_meal_plan($user_data, $recepti)
      {
        $default_meal_plan = new stdClass;
        $dorucak_array = array();
        $rucak_array = array();
        $vecera_array = array();

        // adding recipies in arrays
        foreach ($recepti as $key => $recept) {

          if ($recept->course == 'Breakfast' || $recept->course == 'Side dish') {
            $dorucak_array[] = $recept;
          }
          if ($recept->course == 'Main' || $recept->course == 'Soup') {
            $rucak_array[] = $recept;
          }
          if ($recept->course == 'Salad' || $recept->course == 'Starter') {
            $vecera_array[] = $recept;
          }
        }
        // shuffle so the recepies given to users should be random
        shuffle($dorucak_array);
        shuffle($rucak_array);
        shuffle($vecera_array);



        //adding breakfast to $default_meal_plan
        foreach ($dorucak_array as $key => $recept) {
          $ingredients = array();
          $id_dorucka = $recept->_id;

          //add each recipie ingredient to ingredients array for later checking
          foreach ($recept as $key => $value) {

            if ($key == 'ingredients') {
              foreach ($value as $key => $sastojak) {
                $ingredients[] = $sastojak->name;
              }
            }
          }

          //ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan && ako id dorucka nije vec koriscen za tog korisnika (ubaciti u bazu id svakog obroka koji je vec prikazan korisniku u planu ishrane)
          if (!array_intersect($user_data['iskljucene_namirnice'], $ingredients) &&  !in_array($id_dorucka, $user_data['upotrebljeni_recepti'])) {

            $default_meal_plan->dorucak = $recept;
            break;
          }
        }

        //check if there is not enough meals to fulfill the user requirements
        if (property_exists($default_meal_plan, 'dorucak') == false) {
          $default_meal_plan->dorucak = $recept;
        }


        //adding lunch to $default_meal_plan
        foreach ($rucak_array as $key => $recept) {
          $ingredients = array();
          $id_dorucka = $recept->_id;

          //add each recipie ingredient to ingredients array for later checking
          foreach ($recept as $key => $value) {
            if ($key == 'ingredients') {
              foreach ($value as $key => $sastojak) {
                $ingredients[] = $sastojak->name;
              }
            }
          }

          //ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan *** i ako id dorucka nije vec koriscen za tog korisnika (ubaciti u bazu id svakog obroka koji je vec prikazan korisniku u planu ishrane)
          if (!array_intersect($user_data['iskljucene_namirnice'], $ingredients) &&  !in_array($id_dorucka, $user_data['upotrebljeni_recepti'])) {

            $default_meal_plan->rucak = $recept;
            break;
          }
        }

        //check if there is not enough meals to fulfill the user requirements
        if (property_exists($default_meal_plan, 'rucak') == false) {
          $default_meal_plan->rucak = $recept;
        }


        //adding dinner to $default_meal_plan
        foreach ($vecera_array as $key => $recept) {
          $ingredients = array();
          $id_dorucka = $recept->_id;

          //add each recipie ingredient to ingredients array for later checking
          foreach ($recept as $key => $value) {
            if ($key == 'ingredients') {
              foreach ($value as $key => $sastojak) {
                $ingredients[] = $sastojak->name;
              }
            }
          }

          //ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan *** i ako id dorucka nije vec koriscen za tog korisnika (ubaciti u bazu id svakog obroka koji je vec prikazan korisniku u planu ishrane)
          if (!array_intersect($user_data['iskljucene_namirnice'], $ingredients) &&  !in_array($id_dorucka, $user_data['upotrebljeni_recepti'])) {

            $default_meal_plan->vecera = $recept;
            break;
          }
        }

        //check if there is enough meals to fulfill the user requirements
        if (property_exists($default_meal_plan, 'vecera') == false) {
          $default_meal_plan->vecera = $recept;
        }

        return $default_meal_plan;
      }
      $default_meal_plan = make_default_meal_plan($user_data, $recepti);





      //koliko bi korisnik unosio kalorija po default_meal_plan planu ishrane
      function calculate_default_calorie_intake($default_meal_plan)
      {
        $ukupno_kalorija = null;

        //total sum of calories from all ingredients
        foreach ($default_meal_plan as $key => $recipies) {
          foreach ($recipies->ingredients as $key => $ingredient) {
            $ukupno_kalorija = $ukupno_kalorija + $ingredient->nutrients->carbs;
          }
        }

        return $ukupno_kalorija;
      }
      $calorie_intake_default = calculate_default_calorie_intake($default_meal_plan);






      //izracunavanje potrebne procenta kalorija potrebnog da bi se korisniku prilagodio sedmodnevni_plan_default plan ishrane
      function calculate_calorie_change_percentage($calorie_intake_default, $calorie_intake_needs)
      {
        $calorie_change_percentage = [];

        // razlika ukupnih kalorija u default planu i kalorija koje korisnik treba da unosi dnevno
        $calorie_difference = $calorie_intake_needs - $calorie_intake_default;

        // procentualna razlike izmedju ukupnih kalorija u default planu i kalorija koje korisnik treba da unosi dnevno
        $calorie_difference_percentage = $calorie_difference / $calorie_intake_default * 100;

        //zaoukruzena vrednost procentualne razlike
        $calorie_change_percentage = round($calorie_difference_percentage);

        return $calorie_change_percentage;
      }
      $calorie_change_percentage = calculate_calorie_change_percentage($calorie_intake_default, $user_data['kalorije']); // array 







      //creating customized plan with ingredient quantity and calories adjusted
      function make_customised_plan($calorie_change_percentage, $default_meal_plan)
      {
        $meal_plan = $default_meal_plan;

        //customize the recepies ingredients and update carb intake
        foreach ($meal_plan as $obrok => $recipe) {
          foreach ($recipe as $key => $meal_properties) {
            if ($key == 'ingredients') {
              foreach ($meal_properties as $key => $value) {

                //update quantity of ingredient
                $value->quantity = round($value->quantity + ($value->quantity * ($calorie_change_percentage / 100)));

                //update total carbs of ingredient
                $value->nutrients->carbs = round($value->nutrients->carbs + ($value->nutrients->carbs * ($calorie_change_percentage / 100)));
              }
            }
          }
        }

        return $meal_plan;
      }
      $customized_daily_plan = make_customised_plan($calorie_change_percentage, $default_meal_plan);



      //return fully customized daily meal plan
      return $customized_daily_plan;
    }
    $customized_meal_plan = daily_plan($user_data, $recepti);








    //update user data in DB
    function update_user_DB_data($connect, $query_id, $customized_meal_plan)
    {

      //get used recipies id's in this daily plan
      function used_recipies_ids_array($customized_meal_plan)
      {
        $used_recipies = [];

        foreach ($customized_meal_plan as $key => $recipie_properties) {
          $used_recipies[] = $recipie_properties->_id;
        }

        return $used_recipies;
      }
      $used_recipies = used_recipies_ids_array($customized_meal_plan);

      //make string out of array so it can be concatinated to upotrebljeni_recepti db field
      $used_recipies = implode(',', $used_recipies);

      //update subscription day and used recipies so far
      try {

        $query = "UPDATE korisnici 
                SET dan = IF (dan <= 7, dan+1, dan), 
                upotrebljeni_recepti = CONCAT_WS(',', :upotrebljeni_recepti, upotrebljeni_recepti)
                WHERE id = :id";

        $statement = $connect->prepare($query);
        $statement->bindParam(':id', $query_id, PDO::PARAM_INT);
        $statement->bindParam(':upotrebljeni_recepti', $used_recipies, PDO::PARAM_STR);

        $statement->execute();
      } catch (Exception $e) {
        var_dump($e);
        die("Oh no! There's an error in the query!");
      }
    }
    update_user_DB_data($connect, $query_id, $customized_meal_plan);



    //create json object to return to planishrane.js
    function create_json_object($user_data, $customized_meal_plan)
    {
      $data_obj = new stdClass;

      $data_obj->userData = $user_data;
      $data_obj->mealPlan = $customized_meal_plan;

      $json_data = json_encode($data_obj);

      return $json_data;
    }



    //return data to planIshrane.js
    echo create_json_object($user_data, $customized_meal_plan);

  } else {
    $subscription_end = new stdClass;
    $subscription_end->error = "sub_end";
    $subscription_end_json = json_encode($subscription_end);

    echo $subscription_end_json;
  }

} else {
  $no_id = new stdClass;
  $no_id->error = "no_query_id";
  $no_id = json_encode($no_id);

  echo $no_id;
}







