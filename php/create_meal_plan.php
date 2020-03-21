<?php

/* class Create_meal_plan {
 
	function __construct( $kalorije, $iskljuceneNamirnice, $obrociJSON ) {
		$this->kalorije = $kalorije;
		$this->iskljuceneNamirnice = $iskljuceneNamirnice;
		$this->obrociJSON = $obrociJSON;
	}
  */

	function meal_plan() {
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


		$sedmodnevni_plan = (object) [];
		$
		$placeholder1 = 1;
		
		//dodaje dorucak u sve dane sedmodnevnog plana
		foreach ($obroci->dorucak as $key => $value) { //iteracija $obrociJSON->dorucak(array) koji sadrzi dorucke(object)
			
			if (!in_array($iskljuceneNamirnice , $obroci->dorucak[$key]->sastojci)) {//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
				
				if ($placeholder1 < 8) {
					$sedmodnevni_plan->dan[$placeholder1] = (object) ['dorucak' => $value];
					
				} 
				
			} 
			$placeholder1 = $placeholder1 + 1;
		}
		
		$placeholder2 = 1;

		//dodaje rucak u sve dane sedmodnevnog plana
		foreach ($obroci->rucak as $key1 => $value1) { //iteracija $obrociJSON->dorucak(array) koji sadrzi ruckove(object)
			
			if (!in_array($iskljuceneNamirnice , $obroci->rucak[$key1]->sastojci)) {//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima rucka $obrociJSON->rucak(array)->[0]->sastojci
				
				if ($placeholder2 < 8) {
					$sedmodnevni_plan->dan[$placeholder2] = (object) ['rucak' => $value1];
				} 
			} 
			$placeholder2 = $placeholder2 + 1;
		}


		$placeholder3 = 1;
		//dodaje veceru u sve dane sedmodnevnog plana
		foreach ($obroci->vecera as $key2 => $value2) { //iteracija $obrociJSON->dorucak(array) koji sadrzi vecere(object)
			
			if (!in_array($iskljuceneNamirnice , $obroci->vecera[$key2]->sastojci)) {//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima vecere $obrociJSON->vecera(array)->[0]->sastojci
				
				if ($placeholder3 < 8) {
					$sedmodnevni_plan->dan[$placeholder3] = (object) ['vecera' => $value2];
				} 
		
			} 
				$placeholder3 = $placeholder3 + 1;
		}

		
			var_dump($sedmodnevni_plan);


	} 
 
/* } */

meal_plan();
?>