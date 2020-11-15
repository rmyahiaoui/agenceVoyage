<?php

namespace App\EntityTest;

use App\Entity\Ticket;
use App\Entity\Voyage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    public function testEntity()
    {
        $ticket = new Ticket();
        $ticket->setDeparture('nice');
        $ticket->setArrival('marseille');
        $ticket->setBaggageDrop('200');
        $ticket->setSeat('78A');
        $ticket->setNumber('35A');
        $voyage = new Voyage();
        $voyage->setName('Alicante');
        $voyage->setDuree(7);
        $voyage->setDescription('test');
        $ticket->setVoyage($voyage);
        $ticket->setType(Ticket::TRAIN);
        $ticket->setDepartureDate(new \DateTime('01/02/2020 04:00'));
        $ticket->setArrivalDate(new \DateTime('01/02/2020 07:00'));

        $this->assertEquals($ticket->getDeparture(),'nice');
        $this->assertEquals($ticket->getArrival(),'marseille');
        $this->assertEquals($ticket->getBaggageDrop(),'200');
        $this->assertEquals($ticket->getSeat(),'78A');
        $this->assertEquals($ticket->getNumber(),'35A');
        $this->assertEquals($ticket->getDepartureDate(),new \DateTime('01/02/2020 04:00'));
        $this->assertEquals($ticket->getArrivalDate(),new \DateTime('01/02/2020 07:00'));
        $this->assertEquals($ticket->getVoyage()->getName(),'Alicante');
        $this->assertEquals($ticket->getVoyage()->getDuree(),7);
        $this->assertEquals($ticket->getVoyage()->getDescription(),'test');
    }

}
