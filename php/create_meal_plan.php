<?php

$json_data = file_get_contents("php://input");
$data = json_decode($json_data);

$obroci = $data->obroci;
$sedmodnevni_plan = $data->sedmodnevniPlanTemplate;
$dnevne_potrebe = $data->userCalculatedValues->dailyNeeds;
$iskljucene_namirnice = $data->iskljuceneNamirnice;


function meal_plan($dnevne_potrebe, $obroci, $sedmodnevni_plan, $iskljucene_namirnice) {
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

    //resetovanje iteratora
    $dan_iterator = 1;



    function calculate_daily_intake($sedmodnevni_plan) {
        $ukupno_kalorija = [];

        foreach ($sedmodnevni_plan->dan as $key => $value) {

            //popunjava array sa kalorijama koji predstavlja zbir obroka za svaki dan *startuje (key => 1 - dan 1) da bi bilo lakse da se po danim pronadje broj kalorija
            $ukupno_kalorija[count($ukupno_kalorija) + 1] = $value->dorucak->nutritivnaVrednost->kalorija + $value->rucak->nutritivnaVrednost->kalorija + $value->vecera->nutritivnaVrednost->kalorija;
        }

        return $ukupno_kalorija;
    }
    $dnevni_unos_kalorija = calculate_daily_intake($sedmodnevni_plan);



    function daily_calorie_change_percentage($dnevni_unos_kalorija, $dnevne_potrebe) {
        $dnevne_promene = [];

        // izvlacenje procenta razlike izmedju potrebnih kalorija i kalorija koje obroci nose
        foreach ($dnevni_unos_kalorija as $key => $kalorija_u_obroku) {
            $razlika_u_kalorijama = $dnevne_potrebe->calories - $kalorija_u_obroku;
            $ukupna_procentualna_razlika = $razlika_u_kalorijama / $kalorija_u_obroku * 100;

            var_dump($dnevne_potrebe->calories);
            var_dump($kalorija_u_obroku);

            //ako treba da se doda kolicina sastojaka u obrocima
            if ($razlika_u_kalorijama >= 0) {

                //ako ne treba da se doda manje od 100% kolicine sastojaka koji su u receptu
                if ($ukupna_procentualna_razlika < 100) {
                    $dnevne_promene[$key] = array('+' => round($ukupna_procentualna_razlika));
                }

                //ako treba da se doda vise od 100% kolicine sastojaka koji su u receptu
                if ($ukupna_procentualna_razlika > 100) {
                    $dnevne_promene[$key] = array('+' => round($ukupna_procentualna_razlika));
                }
    
            }

            //ako treba da se oduzme kolicina sastojaka u obrocima
            if ($razlika_u_kalorijama < 0) {

                $dnevne_promene[$key] = array('-' => round($ukupna_procentualna_razlika));
            }

        }

        return $dnevne_promene;
    }
    $dnevna_korekcija_kalorija_procenti = daily_calorie_change_percentage($dnevni_unos_kalorija, $dnevne_potrebe);

    var_dump($dnevna_korekcija_kalorija_procenti);
};
 

meal_plan($dnevne_potrebe, $obroci, $sedmodnevni_plan, $iskljucene_namirnice);
