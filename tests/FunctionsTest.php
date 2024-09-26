<?php

require_once 'src/functions.php';

use PHPUnit\Framework\TestCase;




class FunctionsTest extends TestCase
{
    public function testDisplayPlantsWithValidInput(): void
    {

        $plants = [
            [
                'name' => 'Aloe vera',
                'photo' => '',
                'watering_needs' => 'low',
                'rate' => 'slow',
                'fertilising_needs' => 'every eight weeks',
                'pet_friendliness' => 'Not pet friendly',
            ]
        ];

        $result ="<div class='plant'>";
        $result .="<h4 class='plant-name'>Aloe vera </h4>";
        $result .="<img src=''>";
        $result .="<div class='description'>";
        $result .="<p class='margin-plant-description description-divider'>Watering needs are considered low</p>";
        $result .="<p class='margin-plant-description'>This plant has a slow growth rate</p>";
        $result .="<p class='margin-plant-description'>Fertilise every eight weeks during it's growing season</p>";
        $result .="<p class='margin-plant-description'>Not pet friendly</p>";
        $result .="</div>";
        $result .="</div>";

        $actual = displayPlants($plants);

        $this->assertEquals($result, $actual);
    }
    public function testMalformedPlantData(): void
    {

        $plants = [
            [
                'name' => 'spider',
                'watering_needs' => 'high',
                'rate' => 'slow',
                'fertilising_needs' => 'every eight weeks',
                'pet_friendliness' => 'not pet friendly',
            ]
        ];

        $result ="<div class='plant'>";
        $result .="<h4 class='plant-name'>spider </h4>";
        $result .="<div class='description'>";
        $result .="<p class='margin-plant-description description-divider'>Watering needs are considered high</p>";
        $result .="<p class='margin-plant-description'>This plant has a slow growth rate</p>";
        $result .="<p class='margin-plant-description'>Fertilise every eight weeks during it's growing season</p>";
        $result .="<p class='margin-plant-description'>Not pet friendly</p>";
        $result .="</div>";
        $result .="</div>";

        $actual = displayPlants($plants);

        $this->assertEquals($result, $actual);

    }

public function testDisplayPlantsWithInvalidInput (): void{

        $inputA = 'Not an array';

        $this->expectException(TypeError::class);

        displayPlants($inputA);
}


public function testNameOfPlantMissing(): void
{
    $input = [
        [

            'watering_needs' => 'high',
            'rate' => 'slow',
            'fertilising_needs' => 'every eight weeks',
            'pet_friendliness' => 'not pet friendly',
        ]
    ];

    $this->expectException (InvalidArgumentException::class);

    displayPlants($input);
}
}
