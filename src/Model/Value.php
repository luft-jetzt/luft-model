<?php declare(strict_types=1);

namespace Caldera\LuftModel\Model;

class Value
{
    protected ?string $stationCode = null;
    protected ?\DateTime $dateTime = null;
    protected ?float $value = null;
    protected ?string $pollutant = null;
    protected ?string $tag = null;

    public function __construct()
    {

    }

    public function getStationCode(): ?string
    {
        return $this->stationCode;
    }

    public function setStationCode(string $stationCode): self
    {
        $this->stationCode = $stationCode;

        return $this;
    }

    public function getDateTime(): ?\DateTime
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTime $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getPollutant(): ?string
    {
        return $this->pollutant;
    }

    public function setPollutant(string $pollutant): self
    {
        $this->pollutant = $pollutant;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag = null): self
    {
        $this->tag = $tag;

        return $this;
    }
}
