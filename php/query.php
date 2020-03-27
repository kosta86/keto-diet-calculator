<?php

// SKRIPTA ZA DOBIJANJE NUTRITIVNIH VREDNOSTI HRANE IZ BAZE PODATAKA (NEDOVRSENO)...

//fetch_item.php

include('database_connection.php');

$query_string = explode(' ', $_GET['query']);

/* 
$query = "SELECT * FROM hrana WHERE Naziv LIKE '%legs%' AND Naziv LIKE '%chicken%'"; */

$query = "SELECT * FROM hrana WHERE";


$conds = array();
foreach ($query_string as $val) {
	$conds[] = " Naziv LIKE '%" . $val. "%'";
}

$query .= implode(' AND', $conds);


$statement = $connect->prepare($query);



if ($statement->execute($query_string)) {
	$result = $statement->fetchAll();
	$output = '';

	foreach ($result as $row) {
			$output .= '
						<div class="col-xs-6 col-md-3 col-lg-3" style="margin-top:12px;">  
							<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:auto;" align="center">
            	<h4 class="text-info">' . "id: " . $row["id"] . " " . $row["Naziv"] . '</h4>
            	</div>
        		</div>
			';
	}
	echo $output;
}

