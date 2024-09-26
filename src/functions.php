<?php
function pullPlantsFromDatabase(PDO $db): array
{
    $query = $db->prepare('SELECT `plants`.`name`, `plants`.`growth_rate_id`, `plants`.`watering_needs`, `plants`.`pet_friendliness`, `plants`.`fertilising_needs`, `plants`.`photo`, `growth_rates`.`rate` FROM `plants` JOIN `growth_rates` ON `plants`.`growth_rate_id` = `growth_rates`.`id`');

    $result = $query->execute();

    if ($result) {
        $plants = $query->fetchall();
        return $plants;
    } else {
        return [];
    }
}
function displayPlants(array $plants): string
{
    if (empty($plants)){
        echo 'Fields are empty';
}   else {

    $result = '';
    foreach ($plants as $plant){
    if ($plant['pet_friendliness'] === 1){
        $petFriendly = 'Considered pet friendly';
    } else{
        $petFriendly = 'Not pet friendly';
    }
    $result .= "<div class = 'plant'>";
    if (isset($plant['name'])){
        $result .= "<h4 class = 'plant-name'>{$plant['name']} </h4>";
    } else {
        throw new InvalidArgumentException('Must provide name of plant');
    }
    if (isset($plant['photo']) && !is_null($plant['photo'])) {
        $result .= "<img src='{$plant['photo']}'>";
    }
        $result .= "<div class='description'>";
        $result .= "<p class='margin-plant-description description-divider'>Watering needs are considered {$plant['watering_needs']}</p>";
        $result .= "<p class='margin-plant-description'>This plant has a {$plant['rate']} growth rate</p>";
        $result .= "<p class='margin-plant-description'>Fertilise {$plant['fertilising_needs']} during it's growing season</p>";
        $result .= "<p class='margin-plant-description'>$petFriendly</p>";
        $result .= "</div>";
        $result .= "</div>";
    }
}
    return $result;
}
?>




