<?php


function connect ()
{
$db = new PDO( //creating a variable
    'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
    'root',  //username
    'password');//password

$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

return $db;

}






?>

