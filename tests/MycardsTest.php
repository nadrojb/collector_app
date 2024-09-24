<?php

require_once 'src/mycards.php';

use PHPUnit\Framework\TestCase;


class  MycardsTest extends TestCase
{
public function testDisplayPlantsWithValidInput():void
{

    $plants = [[


            'name' => 'Aloe Vera',
            'watering_needs' => 'Low',
            'growth_rate' => 'Slow',
            'fertilising_needs' => 'Every four weeks',
            'pet_friendliness' => 'No'
    ]
    ];

    $expectedOutput = "<h4>Name of Plant: Aloe Vera </h4><br><p>Watering needs: Low</p><br><p>Growth rate: Slow</p><br><p>Fertilising needs: Once Every four weeks</p><br><p>Pet friendliness: No</p>";

    $this->assertEquals($expectedOutput, displayPlants($plants));
}
}




