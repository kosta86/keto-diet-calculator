<?php

$data = file_get_contents("php://input");

// 1. sanitize user input just in case
/*
 FILTER_SANITIZE_STRING removes most dangerous characters. That may 
 not always be what you want. Read the PHP filters docs. 

 We are also overwriting the $_GET array (the query string) with the sanitized
 versions of these variables.
*/

/* $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING); */

/* 
rebuild query string using white listed variables, 
not $_GET to prevent variable injection as Mārtiņš Briedis 
suggests above.
*/

/* $qv['liquor']  = $_GET['liquor'];
$qv['mixer']   = $_GET['mixer'];
$qv['garnish'] = $_GET['garnish']; */

# build and URL encode the query string using the above array.
/* $querystring = http_build_query($qv); */





// 2. ili ovaj sanitize (bolje onaj gore ako moze)
/* htmlspecialchars($query, ENT_QUOTES) */





