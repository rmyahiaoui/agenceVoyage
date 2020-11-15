<?php

namespace App\EntityTest;

use App\Entity\Ticket;
use App\Entity\Voyage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class VoyageTest extends TestCase
{
    public function testEntity()
    {
        $voyage = new Voyage();
        $voyage->setName('Alicante');
        $voyage->setDuree(7);
        $voyage->setDescription('test');

        $this->assertEquals($voyage->getName(),'Alicante');
        $this->assertEquals($voyage->getDuree(),7);
        $this->assertEquals($voyage->getDescription(),'test');
    }

}
