<?php

$sedmodnevni_plan = file_get_contents("php://input");
$sedmodnevni_plan_json = json_decode($sedmodnevni_plan);

var_dump($sedmodnevni_plan);

/* class Create_meal_plan {
 
	function __construct( $kalorije, $iskljuceneNamirnice, $obrociJSON ) {
		$this->kalorije = $kalorije;
		$this->iskljuceneNamirnice = $iskljuceneNamirnice;
		$this->obrociJSON = $obrociJSON;
	}
  */

	function meal_plan($kalorije) {
		$sedmodnevni_plan = (object) [];
		$dorucak_array[] = (object) array('naziv' => 'dorucak1', 'sastojci' => array('paradajz', 'slanina', 'tost', 'kobasica'), 'kalorija' => 450);
		$dorucak_array[] = (object) array('naziv' => 'dorucak2', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak3', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak4', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak5', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak6', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak7', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak8', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak9', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak10', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak11', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak12', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak13', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$dorucak_array[] = (object) array('naziv' => 'dorucak14', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);
		$rucak_array[] = (object) array('naziv' => 'rucak1', 'sastojci' => array('svinjski vrat', 'slanina', 'zelena salata'), 'kalorija' => 450);
		$rucak_array[] = (object) array('naziv' => 'rucak2', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak3', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak4', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak5', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak6', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak7', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak8', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak9', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak10', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak11', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak12', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak13', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak14', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$rucak_array[] = (object) array('naziv' => 'rucak15', 'sastojci' => array('pileci file', 'paradajz', 'sir'), 'kalorija' => 350);
		$vecera_array[] = (object) array('naziv' => 'vecera1', 'sastojci' => array('tost hleb', 'sunka', 'kackavalj', 'kecap', 'majonez'), 'kalorija' => 550);
		$vecera_array[] = (object) array('naziv' => 'vecera2', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera3', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera4', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera5', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera6', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera7', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera8', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera9', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera10', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera11', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera12', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera13', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera14', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
		$vecera_array[] = (object) array('naziv' => 'vecera15', 'sastojci' => array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);




		/* $sedmodnevni_plan = (object) []; */

		$dorucak = array();

		$obroci = (object) [
			'dorucak' => $dorucak_array,
			'rucak' => $rucak_array,
			'vecera' => $vecera_array
		];

		$iskljuceneNamirnice = 'mast';

		$obrociJSON = json_encode($obroci);

			//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
			if (!in_array($iskljuceneNamirnice , $obroci->dorucak[$key]->sastojci)) {
				$sedmodnevni_plan->dan1 = (object) ['dorucak' => $value];
				/* print_r ('true ' . $key. ' '); */ // proveren - radi if statement
			} 

			//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
			if (!in_array($iskljuceneNamirnice , $obroci->dorucak[$key]->sastojci)) {
				$sedmodnevni_plan->dan1 = (object) ['dorucak' => $value];
				/* print_r ('true ' . $key. ' '); */ // proveren - radi if statement
			} 

		}

		
			var_dump($sedmodnevni_plan);
			phpinfo();


	} 
 
/* } */

meal_plan('argument');
?>