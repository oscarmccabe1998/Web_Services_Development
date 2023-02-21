<?php
define('DB_SERVER', 'lochnagar.abertay.ac.uk');
define('DB_USERNAME', 'sql1603127');
define('DB_PASSWORD', '5NmPj7k2sK3D');
define('DB_NAME', 'sql1603127');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli === false){
    die("ERROR: Could not Connect. " . $mysqli->conect_error);
   
}
?>
