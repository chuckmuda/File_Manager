<?php

/*database configs ...username, password, and database empty for public*/
$db_host = 'localhost';
$db_user = '';
$db_pass =  '';
$db_database = '';



$db = new PDO('mysql:host='.$db_host.';
    dbname='.$db_database,
             $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>
