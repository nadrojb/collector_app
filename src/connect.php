<?php


function connect()
{
    return $db = new PDO( //creating a variable
        'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
        'root',  //username
        'password'  //password
    );
}



$db = new PDO( //creating a variable
    'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
    'root',  //username
    'password'  //password
);

if (!$db){

    echo 'error with database connection';
}


$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db -> prepare ('SELECT * FROM `plants`');


$result = $query->execute();

if ($result){
    $plants = $query -> fetchALL ();
}else {
    echo  'something went wrong';
}

echo '<pre>';
var_dump($plants);