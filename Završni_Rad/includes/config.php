<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD','');
define('DBNAME', 'db_App');

$db=mysqli_connect(DBSERVER,DBUSERNAME,DBPASSWORD,DBNAME);

if($db===false){
    die("Greška: Greška pri povezivanju ".mysqli_connect_error());
}
?>