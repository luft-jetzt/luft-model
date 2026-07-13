# luft-model

Shared data-transfer objects for the [luft.jetzt](https://luft.jetzt) air-quality
data providers. The library contains two plain PHP model classes that describe a
measurement station and a single measured value, and is consumed by the provider
projects that fetch and normalise air-quality data.

The models are deliberately validation-free: they are transport objects with
fluent setters and nullable getters, not domain entities.

## Installation

```bash
composer require luft-jetzt/luft-model
```

Requires PHP 8.3 or newer.

## Models

### `Caldera\LuftModel\Model\Station`

A measurement station. Accessors: `stationCode`, `ubaStationId`, `title`,
`latitude`, `longitude`, `city`, `fromDate`, `untilDate`, `altitude`,
`stationType`, `areaType`, `provider`.

### `Caldera\LuftModel\Model\Value`

A single measured value. Accessors: `stationCode`, `dateTime`, `value`,
`pollutant`, `tag`.

## Usage

Every setter returns the model instance, so calls can be chained:

```php
use Caldera\LuftModel\Model\Station;
use Caldera\LuftModel\Model\Value;

$station = (new Station())
    ->setStationCode('DEHH047')
    ->setTitle('Hamburg Sternschanze')
    ->setLatitude(53.56)
    ->setLongitude(9.96)
    ->setAltitude(10)
    ->setProvider('uba');

$value = (new Value())
    ->setStationCode($station->getStationCode())
    ->setDateTime(new \DateTime('2026-07-13 12:00:00'))
    ->setPollutant('CO')
    ->setValue(43.2);
```

## License

Released under the [MIT License](LICENSE).
