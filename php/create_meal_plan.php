<?php

class Create_meal_plan {
 
	private $sedmodnevni_plan;
 
	function __construct( $kalorije, $iskljuceneNamirnice, $obrociJSON ) {
		$this->kalorije = $kalorije;
		$this->iskljuceneNamirnice = $iskljuceneNamirnice;
		$this->obrociJSON = $obrociJSON;
	}
 
	/* function getName() {
		return $this->name;
	}
 
	function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	} */

	function meal_plan() {
		foreach ($obrociJSON->dorucak as $key => $dorucak) { //iteracija $obrociJSON->dorucak(array) koji sadrzi dorucke(object)

			if (!in_array($iskljuceneNamirnice , $dorucak->stastojci)) {//ako bilo koja namirnica iz $iskljuceneNamirnice(array) nije u sastojcima dorucka $obrociJSON->dorucak(array)->[0]->sastojci
				$sedmodnevni_plan->dan1->dorucak = $dorucak;
			} 

		}
	}
 
}

?>