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
                'pet_friendliness' => 'not pet friendly',
            ]
        ];

        $expectedOutput =
"<div class='plant'><h4 class='plant-name'>Aloe vera </h4><img src=''><div class='description'><p class='margin-plant-description description-divider'>Watering needs are considered low</p><p class='margin-plant-description'>This plant has a slow growth rate</p><p class='margin-plant-description'>Fertilse every eight weeks during it's growing season</p><p class='margin-plant-description'>Not pet friendly</p></div></div>"; // Update this line to reflect the actual output


        $this->assertEquals($expectedOutput, displayPlants($plants));
    }
    public function testMalformedPlantData(): void
    {

        $plants = [
            [
                'name' => '',
                'photo' => '',
                'watering_needs' => 'high',
                'rate' => 'slow',
                'fertilising_needs' => 'every eight weeks',
                'pet_friendliness' => 'not pet friendly',
            ]
        ];

        $expectedOutput =
"<div class='plant'><h4 class='plant-name'>Aloe vera </h4><img src=''><div class='description'><p class='margin-plant-description description-divider'>Watering needs are considered low</p><p class='margin-plant-description'>This plant has a slow growth rate</p><p class='margin-plant-description'>Fertilse every eight weeks during it's growing season</p><p class='margin-plant-description'>Not pet friendly</p></div></div>"; // Update this line to reflect the actual output


        $this->assertNotEquals($expectedOutput, displayPlants($plants));
    }


public function testDisplayPlantsWithInvalidInput (): void{
        $this->expectException(TypeError::class);

        displayPlants(6);
}
}
