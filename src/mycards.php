<?php
require_once 'connect.php';


$db = connect();

$query = $db -> prepare ('SELECT `name`, `growth_rate`,  `watering_needs`, `pet_friendliness`, `fertilising_needs` FROM `plants`');


$result = $query->execute();

if ($result){
    $plants = $query -> fetchALL ();
}else {
    echo  'error';
}


function displayPlant($plants)
{
    $result = '';
    foreach ($plants as $plant) {
         $result .= "<h4>Name of Plant: {$plant['name']} </h4><br><p>Watering needs: {$plant['watering_needs']}</p><br><p>Growth rate: {$plant['growth_rate']}</p><br><p>Fertilising needs: Once {$plant['fertilising_needs']}</p><br><p>Pet friendliness: {$plant['pet_friendliness']}</p>";

    }
    return $result;
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

echo displayPlant($plants);

?>




</body>
</html>

