<?php

require_once '../collector_app/src/functions.php';

$plants = pullPlantsFromDatabase($db);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/modern-normalize.css">
    <link rel="stylesheet" href="src/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<section class="form-wrapper">
        <div class="form-header">
            <h3>Add a new plant to the collection</h3>
        </div>
    <div class="form ">
    <form action="./src/addPlant.php" method="POST" >
        <div class="flex-column padding-bottom-div">
        <label for="name" class="padding-bottom-label">Name of plant</label>
        <input type="text" name="name" placeholder="Enter name here...">
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
        <div class="padding-bottom-label flex-column">
          <label for="img" class="padding-bottom-label">Enter link to image of plant</label>
          <input type="text" name="img">
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
