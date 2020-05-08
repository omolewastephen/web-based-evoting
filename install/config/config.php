<?php
function dbConfig()
{
    $db_name       = '%DATABASE%';
    $db_host       = '%HOSTNAME%';
    $db_pass       = '%PASSWORD%';
    $db_user       = '%USERNAME%';

   return compact('db_name', 'db_host', 'db_pass', 'db_user');
}

?>
