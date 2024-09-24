<?php
require_once 'connect.php';

$db = connectToDatabase();

function pullPlantsFromDatabase(PDO $db): array
{
    $query = $db->prepare('SELECT `plants`.`name`, `plants`.`growth_rate_id`, `plants`.`watering_needs`, `plants`.`pet_friendliness`, `plants`.`fertilising_needs`, `growth_rates`.`rate` FROM `plants` JOIN `growth_rates` ON `plants`.`growth_rate_id` = `growth_rates`.`id`');

    $result = $query->execute();

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

         $result .= "
                     <div class='plant'>
                     <div class='description'>
                     <img src='./img/testplant.webp' alt=''>
                     <h4>Name of Plant: {$plant['name']} </h4> <br>
                     <p>Watering needs: {$plant['watering_needs']}</p> <br>
                     <p>Growth rate: {$plant['rate']}</p> <br>
                     <p>Fertilising needs: Once {$plant['fertilising_needs']}</p> <br>
                     <p>Pet friendly?: $petFriendly </p>                   
                      </div>  
                     </div>
                    ";
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<section class="form-wrapper">
        <div class="form-header">
            <h3>Add a new plant to the collection</h3>
        </div>
    <div class="form ">
    <form action="" method="post" >
        <div class="flex-column padding-bottom-div">
        <label for="name" class="padding-bottom-label">Name of plant</label>
        <input type="text" name="name" placeholder="spider plant">
        </div>
        <div class="flex-column padding-bottom-div">
        <label for="watering" class="padding-bottom-label">Select plants watering needs</label>
        <select name="watering" id="watering">
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select>
        </div>
        <div class="flex-column padding-bottom-div">
        <label for="growth" class="padding-bottom-label">Select plants growth rate</label>
        <select name="growth" id="growth">
            <option value="slow">Slow</option>
            <option value="moderate">Moderate</option>
            <option value="fast">Fast</option>
        </select>
        </div>
        <div class="flex-column padding-bottom-div">
        <label for="fertilising" class="padding-bottom-label">Select plants fertilising needs</label>
        <select name="fertilising" id="fertilising">
            <option value="one">Once a month</option>
            <option value="two">Bimonthly</option>
            <option value="three">Quarterly</option>
        </select>
        </div>
      <div class="flex-column padding-bottom-div">
        <label for="pet" class="padding-bottom-label">Is this plant pet friendly?</label>
        <select name="pet" id="pet">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
      </div>

        <input class="button" type="submit" name="submit" id="" value="Add Plant">

    </form>
    </div>
</section>


<div class="plant-container">
<?php
$allPlants = displayPlants($plants);

echo $allPlants;
?>
</div>
</body>
</html>

