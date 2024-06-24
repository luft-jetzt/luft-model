<?php declare(strict_types=1);

namespace Caldera\LuftModel\Model;

class Station
{
    protected ?string $stationCode = null;
    protected ?int $ubaStationId = null;
    protected ?string $title = null;
    protected ?float $latitude = null;
    protected ?float $longitude = null;
    protected ?string $cityName = null;
    protected ?\DateTime $fromDate = null;
    protected ?\DateTime $untilDate = null;
    protected ?int $altitude = null;
    protected ?string $stationType = null;
    protected ?string $areaType = null;
    protected ?string $provider = null;
    protected ?string $network = null;

    public function getStationCode(): ?string
    {
        return $this->stationCode;
    }

    public function setStationCode(string $stationCode): Station
    {
        $this->stationCode = $stationCode;

        return $this;
    }

    public function getUbaStationId(): ?int
    {
        return $this->ubaStationId;
    }

    public function setUbaStationId(int $ubaStationId): Station
    {
        $this->ubaStationId = $ubaStationId;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): Station
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): Station
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title = null): Station
    {
        $this->title = $title;

        return $this;
    }

    public function setCity(string $cityName = null): Station
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->cityName;
    }

    public function getFromDate(): ?\DateTime
    {
        return $this->fromDate;
    }

    public function setFromDate(\DateTime $fromDate = null): Station
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    public function getUntilDate(): ?\DateTime
    {
        return $this->untilDate;
    }

    public function setUntilDate(\DateTime $untilDate = null): Station
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    public function getAltitude(): ?int
    {
        return $this->altitude;
    }

    public function setAltitude(int $altitude): Station
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getStationType(): ?string
    {
        return $this->stationType;
    }

    public function setStationType(string $stationType = null): Station
    {
        $this->stationType = $stationType;

        return $this;
    }

    public function getAreaType(): ?string
    {
        return $this->areaType;
    }

    public function setAreaType(string $areaType = null): Station
    {
        $this->areaType = $areaType;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): Station
    {
        $this->provider = $provider;

        return $this;
    }
}
