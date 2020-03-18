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
		$dorucak_array[] = (object) array('naziv' => 'recept1', 'sastojci' => array('paradajz', 'slanina', 'tost', 'kobasica'), 'kalorija' => 450);
		$dorucak_array[] = (object) array('naziv' => 'recept2', 'sastojci' => array('sir', 'prsuta', 'tortilja'), 'kalorija' => 200);

		/* $sedmodnevni_plan = (object) []; */

		$dorucak = array();

		$obroci = (object) [
			'dorucak' => $dorucak_array,
			'rucak' => 'null',
			'vecera' => 'null'
		];

		$iskljuceneNamirnice = 'prsuta';

		$obrociJSON = json_encode($obroci);
		/* $sedmodnevni_plan; */

		foreach ($obroci->dorucak as $key => $value) { //iteracija $obrociJSON->dorucak(array) koji sadrzi dorucke(object)

			if (!in_array($iskljuceneNamirnice , $obroci->dorucak[$key]->sastojci)) {//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
				$sedmodnevni_plan->dan1 = (object) ['dorucak' => $value];
				/* print_r ('true ' . $key. ' '); */ // proveren - radi if statement
			} 
		}

		
			var_dump($sedmodnevni_plan);


	}
 
/* } */

meal_plan();
?>