<?php

namespace App\Entity;

use App\Repository\ParameterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParameterRepository::class)]
class Parameter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $OpenMon = null;

    #[ORM\Column]
    private ?bool $OpenThu = null;

    #[ORM\Column]
    private ?bool $OpenWed = null;

    #[ORM\Column]
    private ?bool $OpenThur = null;

    #[ORM\Column]
    private ?bool $OpenFri = null;

    #[ORM\Column]
    private ?bool $OpenSat = null;

    #[ORM\Column]
    private ?bool $OpenSun = null;

    #[ORM\Column]
    private ?int $numberOfPlacesLunch = null;

    #[ORM\Column]
    private ?int $numberOfPlacesDinner = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $scheduleCms = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isOpenMon(): ?bool
    {
        return $this->OpenMon;
    }

    public function setOpenMon(bool $OpenMon): self
    {
        $this->OpenMon = $OpenMon;

        return $this;
    }

    public function isOpenThu(): ?bool
    {
        return $this->OpenThu;
    }

    public function setOpenThu(bool $OpenThu): self
    {
        $this->OpenThu = $OpenThu;

        return $this;
    }

    public function isOpenWed(): ?bool
    {
        return $this->OpenWed;
    }

    public function setOpenWed(bool $OpenWed): self
    {
        $this->OpenWed = $OpenWed;

        return $this;
    }

    public function isOpenThur(): ?bool
    {
        return $this->OpenThur;
    }

    public function setOpenThur(bool $OpenThur): self
    {
        $this->OpenThur = $OpenThur;

        return $this;
    }

    public function isOpenFri(): ?bool
    {
        return $this->OpenFri;
    }

    public function setOpenFri(bool $OpenFri): self
    {
        $this->OpenFri = $OpenFri;

        return $this;
    }

    public function isOpenSat(): ?bool
    {
        return $this->OpenSat;
    }

    public function setOpenSat(bool $OpenSat): self
    {
        $this->OpenSat = $OpenSat;

        return $this;
    }

    public function isOpenSun(): ?bool
    {
        return $this->OpenSun;
    }

    public function setOpenSun(bool $OpenSun): self
    {
        $this->OpenSun = $OpenSun;

        return $this;
    }

    public function getNumberOfPlacesLunch(): ?int
    {
        return $this->numberOfPlacesLunch;
    }

    public function setNumberOfPlacesLunch(int $numberOfPlacesLunch): self
    {
        $this->numberOfPlacesLunch = $numberOfPlacesLunch;

        return $this;
    }

    public function getNumberOfPlacesDinner(): ?int
    {
        return $this->numberOfPlacesDinner;
    }

    public function setNumberOfPlacesDinner(int $numberOfPlacesDinner): self
    {
        $this->numberOfPlacesDinner = $numberOfPlacesDinner;

        return $this;
    }

    public function getScheduleCms(): ?string
    {
        return $this->scheduleCms;
    }

    public function setScheduleCms(?string $scheduleCms): self
    {
        $this->scheduleCms = $scheduleCms;

        return $this;
    }
}
