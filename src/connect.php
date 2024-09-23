<?php



$db = new PDO( //creating a variable
    'mysql:host=DB;dbname=houseplant',  //DSN, make sure there are no spaces!!!
    'root',  //username
    'password'  //password
);

if (!$db){

    echo 'error with database connection';
}


$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db -> prepare ('SELECT `name`, `growth_rate`,  `watering_needs`, `pet_friendliness`, `fertilising_needs` FROM `plants`');


$result = $query->execute();

if ($result){
    $plants = $query -> fetchALL ();
}else {
    echo  'something went wrong';
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

foreach ($plants as $plant){
    echo "<h4>Name of Plant: {$plant['name']} </h4>" . "<br>" . "<p>Watering needs: {$plant['watering_needs']} </p>" . "<br>" . "<p> Growth rate: {$plant['growth_rate']} </p>" . "<br>" . "<p> Fertilising needs: Once {$plant['fertilising_needs']} </p>" .  "<br>" . "<p>Pet friendliness: {$plant['pet_friendliness']} </p>";
}

?>




</body>
</html>
