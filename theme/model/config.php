<?php
function dbConfig()
{
    $db_name       = 'evoting';
    $db_host       = 'localhost';
    $db_pass       = '';
    $db_user       = 'root';

   return compact('db_name', 'db_host', 'db_pass', 'db_user');
}

?>
