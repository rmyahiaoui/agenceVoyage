<?php

namespace App\EntityTest;

use App\Service\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTestTest extends TestCase
{
    public function testService()
    {
        $utils = new Utils();
        $this->assertEquals($utils->getLabelType(1), 'Avion');
        $this->assertEquals($utils->getLabelType(2), 'Bus');
        $this->assertEquals($utils->getLabelType(3), 'Train');
        $this->assertEquals($utils->getLabelType(4), 'Bateau');
        $this->assertEquals($utils->getLabelType(), 'Avion');
    }

}
