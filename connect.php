<?php

/*database configs ...user-charliez_charlie, pass-a1232123*/
$db_host = 'localhost';
$db_user = 'charliez_charlie';
$db_pass =  'a1232123';
$db_database = 'charliez_hosting';



$db = new PDO('mysql:host='.$db_host.';
    dbname='.$db_database,
             $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>