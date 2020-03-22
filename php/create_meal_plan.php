<?php

$json_data = file_get_contents("php://input");
$data = json_decode($json_data);

$obroci = $data->obroci;
$sedmodnevni_plan = $data->sedmodnevniPlanTemplate;

$iskljucene_namirnice = 'mast';





function meal_plan($kalorije, $obroci, $sedmodnevni_plan, $iskljucene_namirnice) {
    $dorucak_array = $obroci->dorucak;
    shuffle($dorucak_array);

    $rucak_array = $obroci->rucak;
    shuffle($rucak_array);

    $vecera_array = $obroci->vecera;
    shuffle($vecera_array);

    $dan_iterator = 1;

    // popunjavanje dorucka za svaki dan sedmodnevnog plana
    foreach ($dorucak_array as $key => $value) {

		//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan
		if (!in_array($iskljucene_namirnice, array($dorucak_array[$key]->sastojci)) && $dan_iterator <= 7) {
            $sedmodnevni_plan->dan->{$dan_iterator}->dorucak = $value;
            $dan_iterator++;
		}
    }

    //resetovanje iteratora
    $dan_iterator = 1;

    // popunjavanje rucka za svaki dan sedmodnevnog plana
    foreach ($rucak_array as $key => $value) {

        //ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan
        if (!in_array($iskljucene_namirnice, array($rucak_array[$key]->sastojci)) && $dan_iterator <= 7) {
            $sedmodnevni_plan->dan->{$dan_iterator}->rucak = $value;
            $dan_iterator++;
        }
    }

    //resetovanje iteratora
    $dan_iterator = 1;

    // popunjavanje rucka za svaki dan sedmodnevnog plana
    foreach ($vecera_array as $key => $value) {

        //ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima obroka koji je trenutno u iteraciji ubacuje taj obrok u plan
        if (!in_array($iskljucene_namirnice, array($vecera_array[$key]->sastojci)) && $dan_iterator <= 7) {
            $sedmodnevni_plan->dan->{$dan_iterator}->vecera = $value;
            $dan_iterator++;
        }
    }


    var_dump($sedmodnevni_plan);
};
 

meal_plan('argument', $obroci, $sedmodnevni_plan, $iskljucene_namirnice);
