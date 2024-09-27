<?php

require_once 'src/functions.php';

require_once 'src/connect.php';

require_once 'src/addPlantFunction.php';

$db = connectToDatabase();

    if (isset($_POST['name']) && isset($_POST['watering']) && isset($_POST['growth']) && isset($_POST['fertilising']) && isset($_POST['pet']) && isset($_POST['img'])) {

        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($name === false) {
            echo 'invalid name';
        }
        $watering = filter_var($_POST['watering'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($watering === false) {
            echo 'invalid input';
        }
        $growth = filter_var($_POST['growth'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($growth === false) {
            echo 'invalid input';
        }
        $fertilising = filter_var($_POST['fertilising'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($fertilising === false) {
            echo 'invalid input';
        }
        $pet = filter_var($_POST['pet'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($pet === false) {
            echo 'invalid input';
        }
        $img = filter_var($_POST['img'], FILTER_SANITIZE_URL);
        if ($img === false) {
            echo 'invalid input';
        }
    }
    if ($name && $watering && $growth && $fertilising && $pet && $img) {

        $data = [
            'name' => $name,
            'growth_rate_id' => $growth,
            'watering_needs' => $watering,
            'pet_friendliness' => $pet,
            'photo' => $img
        ];

addToTable($db, $data);
    }
    
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
        <form action="index.php" method="POST" >
            <div class="flex-column padding-bottom-div">
                <label for="name" class="padding-bottom-label">Name of plant</label>
                <input type="text" name="name" placeholder="Enter name here..." required>
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
                    <option value="1">Slow</option>
                    <option value="2">Moderate</option>
                    <option value="3">Fast</option>
                </select>
            </div>
            <div class="flex-column padding-bottom-div">
                <label for="fertilising" class="padding-bottom-label">Select plants fertilising needs</label>
                <select name="fertilising" id="fertilising">
                    <option value="3">Once a month</option>
                    <option value="2">Bimonthly</option>
                    <option value="1">Quarterly</option>
                </select>
            </div>
            <div class="flex-column padding-bottom-div">
                <label for="pet" class="padding-bottom-label">Is this plant pet friendly?</label>
                <select name="pet" id="pet">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="padding-bottom-label flex-column">
                <label for="img" class="padding-bottom-label">Enter link to image of plant</label>
                <input type="text" name="img" placeholder="Enter link...">
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

