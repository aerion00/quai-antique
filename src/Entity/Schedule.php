<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hour = null;

    #[ORM\Column(length: 255)]
    private ?string $timeOfTheDay = null;

    #[ORM\Column]
    private ?bool $boolean = null;

    public function __toString(): string
    {
        return $this->hour;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHour(): ?string
    {
        return $this->hour;
    }

    public function setHour(string $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getTimeOfTheDay(): ?string
    {
        return $this->timeOfTheDay;
    }

    public function setTimeOfTheDay(string $timeOfTheDay): self
    {
        $this->timeOfTheDay = $timeOfTheDay;

        return $this;
    }

    public function isBoolean(): ?bool
    {
        return $this->boolean;
    }

    public function setBoolean(bool $boolean): self
    {
        $this->boolean = $boolean;

        return $this;
    }
}
