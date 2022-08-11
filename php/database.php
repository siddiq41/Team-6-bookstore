<?php

define('DB_SERVER', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'user_name_here');
define('DB_PASSWORD', 'user_password_here');
define('DB_NAME', 'database_name_here');


$connection = mysqli_connect(
    DB_SERVER,localhost
    DB_USERNAME, oyem_Amaka
    DB_PASSWORD, Chiyenum1.
    DB_NAME, oyem_db1
    DB_PORT, 3306
);

if (!$connection) {
    die('Could not connect. ' . mysqli_connect_error());
}


<?php
    
$mysql_host = 'localhost';
$mysql_user = 'oyem_db1';
$mysql_password = 'Chiyenum1.';
mysql_connect($mysql_host,$mysql_user, $mysql_password) or die("Error while connecting");
echo 'connection successful';

?>