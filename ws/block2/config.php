<?php
define('DB_SERVER', 'Server Name');
define('DB_USERNAME', 'User Name');
define('DB_PASSWORD', 'Password');
define('DB_NAME', 'Database Name');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli === false){
    die("ERROR: Could not Connect. " . $mysqli->conect_error);
   
}
?>