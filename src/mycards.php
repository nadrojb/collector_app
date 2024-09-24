<?php
require_once 'connect.php';

$db = connectToDatabase();

function pullPlantsFromDatabase(PDO $db): array
{
    $query = $db->prepare('SELECT `plants`.`name`, `plants`.`growth_rate_id`, `plants`.`watering_needs`, `plants`.`pet_friendliness`, `plants`.`fertilising_needs`, `growth_rates`.`rate` FROM `plants` JOIN `growth_rates` ON `plants`.`growth_rate_id` = `growth_rates`.`id`');

    $result = $query->execute();

    //SELECT `stuff`, `growth_rates`.`name` AS `growth_rate`, `more stuff` FROM `plants`
    // JOIN `growth_rates` ON `plants`.`growth_rate_id` = `growth_rates`.`id`

    if ($result) {
        $plants = $query->fetchALL();
        return $plants;
    } else {
        return [];
    }
}

$plants = pullPlantsFromDatabase($db);




function displayPlants(array $plants): string
{
    $result = '';
    foreach ($plants as $plant){

    if ($plant['pet_friendliness'] === 1){
        $petFriendly = 'yes';
    }else{
        $petFriendly= 'no';
    }

         $result .= "<div>
                     <h4>Name of Plant: {$plant['name']} </h4> <br>
                     <p>Watering needs: {$plant['watering_needs']}</p> <br>
                     <p>Growth rate: {$plant['rate']}</p> <br>
                     <p>Fertilising needs: Once {$plant['fertilising_needs']}</p> <br>
                     <p>Pet friendly?: $petFriendly </p>                   
                     </div>";
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
    <link rel="stylesheet" href="./modern-normalize.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
$allPlants = displayPlants($plants);

echo $allPlants;
?>
</body>
</html>

