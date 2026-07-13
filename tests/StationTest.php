<?php declare(strict_types=1);

namespace Caldera\LuftModel\Tests;

use Caldera\LuftModel\Model\Station;
use PHPUnit\Framework\TestCase;

class StationTest extends TestCase
{
    private Station $station;

    protected function setUp(): void
    {
        $this->station = new Station();
    }

    public function testInitialStateIsNull(): void
    {
        $this->assertNull($this->station->getStationCode());
        $this->assertNull($this->station->getUbaStationId());
        $this->assertNull($this->station->getTitle());
        $this->assertNull($this->station->getLatitude());
        $this->assertNull($this->station->getLongitude());
        $this->assertNull($this->station->getCity());
        $this->assertNull($this->station->getFromDate());
        $this->assertNull($this->station->getUntilDate());
        $this->assertNull($this->station->getAltitude());
        $this->assertNull($this->station->getStationType());
        $this->assertNull($this->station->getAreaType());
        $this->assertNull($this->station->getProvider());
    }

    public function testStationCode(): void
    {
        $this->station->setStationCode('TEST123');

        $this->assertSame('TEST123', $this->station->getStationCode());
    }

    public function testUbaStationId(): void
    {
        $this->station->setUbaStationId(123);

        $this->assertSame(123, $this->station->getUbaStationId());
    }

    public function testTitle(): void
    {
        $this->station->setTitle('Test-Title');

        $this->assertSame('Test-Title', $this->station->getTitle());
    }

    public function testEmptyTitleIsPreserved(): void
    {
        $this->station->setTitle('');

        $this->assertSame('', $this->station->getTitle());
    }

    public function testLatitude(): void
    {
        $this->station->setLatitude(53.10);

        $this->assertSame(53.10, $this->station->getLatitude());
    }

    public function testLongitude(): void
    {
        $this->station->setLongitude(10.53);

        $this->assertSame(10.53, $this->station->getLongitude());
    }

    public function testBoundaryCoordinatesAreNotValidated(): void
    {
        // The model deliberately performs no range validation.
        $this->station->setLatitude(-90.0)->setLongitude(180.0);

        $this->assertSame(-90.0, $this->station->getLatitude());
        $this->assertSame(180.0, $this->station->getLongitude());
    }

    public function testCityName(): void
    {
        $this->station->setCity('Test-City');

        $this->assertSame('Test-City', $this->station->getCity());
    }

    public function testFromDate(): void
    {
        $date = new \DateTime('2026-06-25 15:01:03');
        $this->station->setFromDate($date);

        // The DTO stores and returns the very same instance (mutable by design).
        $this->assertSame($date, $this->station->getFromDate());
    }

    public function testUntilDate(): void
    {
        $date = new \DateTime('2026-06-25 15:01:55');
        $this->station->setUntilDate($date);

        $this->assertSame($date, $this->station->getUntilDate());
    }

    public function testAltitude(): void
    {
        $this->station->setAltitude(42);

        $this->assertSame(42, $this->station->getAltitude());
    }

    public function testAltitudeAtSeaLevel(): void
    {
        $this->station->setAltitude(0);

        $this->assertSame(0, $this->station->getAltitude());
    }

    public function testAltitudeBelowSeaLevelIsNotValidated(): void
    {
        $this->station->setAltitude(-5);

        $this->assertSame(-5, $this->station->getAltitude());
    }

    public function testStationType(): void
    {
        $this->station->setStationType('Test-Type');

        $this->assertSame('Test-Type', $this->station->getStationType());
    }

    public function testAreaType(): void
    {
        $this->station->setAreaType('Area-Type');

        $this->assertSame('Area-Type', $this->station->getAreaType());
    }

    public function testProvider(): void
    {
        $this->station->setProvider('Test-Provider');

        $this->assertSame('Test-Provider', $this->station->getProvider());
    }

    public function testNullableSettersResetToNull(): void
    {
        $this->station
            ->setTitle('x')
            ->setCity('x')
            ->setStationType('x')
            ->setAreaType('x')
            ->setAltitude(1)
            ->setFromDate(new \DateTime())
            ->setUntilDate(new \DateTime());

        $this->station
            ->setTitle(null)
            ->setCity(null)
            ->setStationType(null)
            ->setAreaType(null)
            ->setAltitude(null)
            ->setFromDate(null)
            ->setUntilDate(null);

        $this->assertNull($this->station->getTitle());
        $this->assertNull($this->station->getCity());
        $this->assertNull($this->station->getStationType());
        $this->assertNull($this->station->getAreaType());
        $this->assertNull($this->station->getAltitude());
        $this->assertNull($this->station->getFromDate());
        $this->assertNull($this->station->getUntilDate());
    }

    public function testSettersReturnSelf(): void
    {
        $this->assertSame($this->station, $this->station->setStationCode('x'));
        $this->assertSame($this->station, $this->station->setUbaStationId(1));
        $this->assertSame($this->station, $this->station->setTitle('x'));
        $this->assertSame($this->station, $this->station->setLatitude(1.0));
        $this->assertSame($this->station, $this->station->setLongitude(1.0));
        $this->assertSame($this->station, $this->station->setCity('x'));
        $this->assertSame($this->station, $this->station->setFromDate(new \DateTime()));
        $this->assertSame($this->station, $this->station->setUntilDate(new \DateTime()));
        $this->assertSame($this->station, $this->station->setAltitude(1));
        $this->assertSame($this->station, $this->station->setStationType('x'));
        $this->assertSame($this->station, $this->station->setAreaType('x'));
        $this->assertSame($this->station, $this->station->setProvider('x'));
    }

    public function testFluentChaining(): void
    {
        $result = $this->station
            ->setStationCode('DEHH047')
            ->setTitle('Hamburg')
            ->setLatitude(53.55)
            ->setLongitude(9.99);

        $this->assertSame($this->station, $result);
        $this->assertSame('DEHH047', $this->station->getStationCode());
        $this->assertSame('Hamburg', $this->station->getTitle());
        $this->assertSame(53.55, $this->station->getLatitude());
        $this->assertSame(9.99, $this->station->getLongitude());
    }
}
