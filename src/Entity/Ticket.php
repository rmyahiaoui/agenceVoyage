<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 * @ORM\Table(name="ticket",
 *     uniqueConstraints={
 *     @ORM\UniqueConstraint(name="ticket_departure_unique", columns={"departure","voyage_id"}),
 *      @ORM\UniqueConstraint(name="ticket_arrival_unique", columns={"arrival","voyage_id"}),
 *     })
 */
class Ticket
{
    const PLAIN     = 1;
    const BUS       = 2;
    const TRAIN     = 3;
    const BATEAU    = 4;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $departure;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $arrival;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $seat;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=10, nullable=true))
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $gate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $baggageDrop;

    /**
     * @ORM\ManyToOne(targetEntity=Voyage::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrivalDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparture(): ?string
    {
        return $this->departure;
    }

    public function setDeparture(string $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getArrival(): ?string
    {
        return $this->arrival;
    }

    public function setArrival(string $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getSeat(): ?string
    {
        return $this->seat;
    }

    public function setSeat(?string $seat): self
    {
        $this->seat = $seat;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getGate(): ?string
    {
        return $this->gate;
    }

    public function setGate(?string $gate): self
    {
        $this->gate = $gate;

        return $this;
    }

    public function getBaggageDrop(): ?string
    {
        return $this->baggageDrop;
    }

    public function setBaggageDrop(?string $baggageDrop): self
    {
        $this->baggageDrop = $baggageDrop;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage( $voyage): self
    {
        if (is_string($voyage)) {
            $this->voyage_id = (int)$voyage;
        }  else {
            $this->voyage = $voyage;
        }

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

}
