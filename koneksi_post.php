<?php
$db_username = 'hrclinic_1'; // Your MYSQL Username.
$db_password = 'hrclinic_1'; // Your MYSQL Password.
$db_name = 'hrclinic_1'; // Your Database name.
$db_host = 'localhost';
 
$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('Error: Could not connect to database.');
?>