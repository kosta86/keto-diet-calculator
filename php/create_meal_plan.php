<?php

$json_data = file_get_contents("php://input");
$data = json_decode($json_data);

$obroci = $data->obroci;
$sedmodnevni_plan = $data->sedmodnevniPlanTemplate;

$iskljuceneNamirnice = 'mast';


var_dump($$sedmodnevni_plan->dan->{'1'});



function meal_plan($kalorije, $obroci, $sedmodnevni_plan, $iskljucene_namirnice) {
    $dorucak_array = $obroci->dorucak;
    $rucak_array = $obroci->rucak;
    $vecera_array = $obroci->vecera;

    foreach ($dorucak as $key => $value) {

		//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
		if (!in_array($iskljuceneNamirnice, $dorucak_array[$key]->sastojci) {
			$sedmodnevni_plan->dan = (object) ['dorucak' => $value]
		}

    }

    


    var_dump($sedmodnevni_plan);
};
 

meal_plan('argument', $obroci, $sedmodnevni_plan, $iskljucene_namirnice);
