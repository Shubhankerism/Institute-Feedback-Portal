<?php
/**
 * Created by PhpStorm.
 * User: tjuhi
 * Date: 2/28/2017
 * Time: 3:01 PM
 */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'aurora');
$db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$db1=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

?>