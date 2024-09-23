<?php


$db = new PDO( //creating a variable
    'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
    'root',  //username
    'password'  //password
);

if ($db){
    echo 'connected';
} else {
    echo 'error with connection';
}