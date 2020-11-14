<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\{Voyage, Ticket};

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $voyage = new Voyage();
        $voyage->setName('Alicante');
        $voyage->setDuree(7);
        $manager->persist($voyage);

        $ticket5 = new Ticket();
        $ticket5->setStep(1);
        $ticket5->setDeparture('nice');
        $ticket5->setArrival('marseille');
        $ticket5->setBaggageDrop('200');
        $ticket5->setSeat('78A');
        $ticket5->setNumber('35A');
        $ticket5->setVoyage($voyage);
        $ticket5->setType(Ticket::TRAIN);
        $ticket5->setDepartureDate(new \DateTime('01/02/2020 04:00'));
        $ticket5->setArrivalDate(new \DateTime('01/02/2020 07:00'));
        $manager->persist($ticket5);

        $ticket1 = new Ticket();
        $ticket1->setStep(2);
        $ticket1->setDeparture('marseille');
        $ticket1->setArrival('barcelone');
        $ticket1->setBaggageDrop('344');
        $ticket1->setSeat('24A');
        $ticket1->setGate('45B');
        $ticket1->setNumber('1985B');
        $ticket1->setVoyage($voyage);
        $ticket1->setType(Ticket::PLAIN);
        $ticket1->setDepartureDate(new \DateTime('01/02/2020 08:00'));
        $ticket1->setArrivalDate(new \DateTime('01/02/2020 09:00'));
        $manager->persist($ticket1);

        $ticket3 = new Ticket();
        $ticket3->setStep(3);
        $ticket3->setDeparture('barcelone');
        $ticket3->setArrival('madrid');
        $ticket3->setBaggageDrop('500');
        $ticket3->setNumber('1100');
        $ticket3->setVoyage($voyage);
        $ticket3->setType(Ticket::BUS);
        $ticket3->setDepartureDate(new \DateTime('01/02/2020 11:00:00'));
        $ticket3->setArrivalDate(new \DateTime('01/02/2020 14:00'));
        $manager->persist($ticket3);

        $ticket2 = new Ticket();
        $ticket2->setStep(4);
        $ticket2->setDeparture('madrid');
        $ticket2->setArrival('alicante');
        $ticket2->setBaggageDrop('500');
        $ticket2->setSeat('24A');
        $ticket2->setGate('46B');
        $ticket2->setNumber('1988C');
        $ticket2->setVoyage($voyage);
        $ticket2->setType(Ticket::PLAIN);
        $ticket2->setDepartureDate(new \DateTime('01/02/2020 14:00'));
        $ticket2->setArrivalDate(new \DateTime('01/02/2020 15:00'));
        $manager->persist($ticket2);



        $ticket4 = new Ticket();
        $ticket4->setStep(5);
        $ticket4->setDeparture('alicante');
        $ticket4->setArrival('canari');
        $ticket4->setSeat('24A');
        $ticket4->setGate('47B');
        $ticket4->setNumber('1954A');
        $ticket4->setVoyage($voyage);
        $ticket4->setType(Ticket::PLAIN);
        $ticket4->setDepartureDate(new \DateTime('01/02/2020 17:00'));
        $ticket4->setArrivalDate(new \DateTime('01/02/2020 20:00'));
        $manager->persist($ticket4);
        $manager->flush();

        $voyage2 = new Voyage();
        $voyage2->setName('NEW YORK');
        $voyage2->setDuree(14);
        $manager->persist($voyage2);

        $ticket5 = new Ticket();
        $ticket5->setStep(1);
        $ticket5->setDeparture('nice');
        $ticket5->setArrival('marseille');
        $ticket5->setBaggageDrop('200');
        $ticket5->setSeat('78A');
        $ticket5->setNumber('35A');
        $ticket5->setVoyage($voyage2);
        $ticket5->setType(Ticket::TRAIN);
        $ticket5->setDepartureDate(new \DateTime('01/02/2020 04:00'));
        $ticket5->setArrivalDate(new \DateTime('01/02/2020 07:00'));
        $manager->persist($ticket5);

        $ticket1 = new Ticket();
        $ticket1->setStep(2);
        $ticket1->setDeparture('marseille');
        $ticket1->setArrival('paris');
        $ticket1->setBaggageDrop('344');
        $ticket1->setSeat('24A');
        $ticket1->setGate('45B');
        $ticket1->setNumber('1985B');
        $ticket1->setVoyage($voyage2);
        $ticket1->setType(Ticket::PLAIN);
        $ticket1->setDepartureDate(new \DateTime('01/02/2020 08:00'));
        $ticket1->setArrivalDate(new \DateTime('01/02/2020 09:00'));
        $manager->persist($ticket1);

        $ticket3 = new Ticket();
        $ticket3->setStep(3);
        $ticket3->setDeparture('paris');
        $ticket3->setArrival('NEW YORK');
        $ticket3->setBaggageDrop('500');
        $ticket3->setNumber('1100');
        $ticket3->setVoyage($voyage2);
        $ticket3->setType(Ticket::BUS);
        $ticket3->setDepartureDate(new \DateTime('01/02/2020 11:00:00'));
        $ticket3->setArrivalDate(new \DateTime('01/02/2020 14:00'));
        $manager->persist($ticket3);


        $manager->flush();
    }
}
