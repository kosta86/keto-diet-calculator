<?php

$objekat = file_get_contents("php://input");
$objekat = json_decode($objekat);

var_dump($objekat);

    function meal_plan($kalorije, $sedmodnevni_plan)
    {
        $objekat = (object) [];
        $dorucak_array[] = (object) array('naziv' => 'dorucak1', 'sastojci' => (object) array('paradajz'=> 200, 'slanina'=> 200, 'tost'=> 200, 'kobasica'=> 200), 'kalorija' => 450);
        $dorucak_array[] = (object) array('naziv' => 'dorucak2', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak3', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak4', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak5', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak6', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak7', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak8', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak9', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak10', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak11', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak12', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak13', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $dorucak_array[] = (object) array('naziv' => 'dorucak14', 'sastojci' => (object) array('sir'=> 200, 'prsuta' => 300, 'tortilja'=> 100), 'kalorija' => 200);
        $rucak_array[] = (object) array('naziv' => 'rucak1', 'sastojci' => (object) array('svinjski vrat'=> 250 , 'slanina'=> 150, 'zelena salata'=> 150), 'kalorija' => 450);
        $rucak_array[] = (object) array('naziv' => 'rucak2', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak3', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak4', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak5', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak6', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak7', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak8', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak9', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak10', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak11', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak12', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak13', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak14', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $rucak_array[] = (object) array('naziv' => 'rucak15', 'sastojci' => (object) array('pileci file'=> 200, 'paradajz' => 150, 'sir'=> 150), 'kalorija' => 350);
        $vecera_array[] = (object) array('naziv' => 'vecera1', 'sastojci' => (object) array('tost hleb'=> 50, 'sunka'=> 250, 'kackavalj'=> 200, 'kecap'=> 50, 'majonez'=> 50), 'kalorija' => 550);
        $vecera_array[] = (object) array('naziv' => 'vecera2', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera3', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera4', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera5', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera6', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera7', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera8', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera9', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera10', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera11', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera12', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera13', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera14', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);
        $vecera_array[] = (object) array('naziv' => 'vecera15', 'sastojci' => (object) array('tortilja', 'pecenica', '', 'paradajz', 'krastavac'), 'kalorija' => 400);

        $obroci = (object) [
            'dorucak' => $dorucak_array,
            'rucak' => $rucak_array,
            'vecera' => $vecera_array
        ];

        $iskljuceneNamirnice = 'mast';

		$dan_iterator = ['prvi', 'drugi', 'treci', 'cetvrti', 'peti', 'sesti', 'sedmi'];

        foreach ($dan_iterator as $key => $dan) {
            foreach ($sedmodnevni_plan->dan->$dan as $key1 => $value1) {
                if ($key == 'dorucak') {
                    $key->$value1 = $obroci->dorucak[0];
                }
            }
        }

        

        /* var_dump($obroci); */
        var_dump($sedmodnevni_plan);
       
    }
 

meal_plan('argument', $objekat);

?>