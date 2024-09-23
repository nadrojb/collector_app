<?php

$db = new PDO( //creating a variable
    'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
    'root',  //username
    'password'  //password
);

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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Plants</title>
</head>
<body>

</body>
</html>
