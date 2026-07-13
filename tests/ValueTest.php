<?php declare(strict_types=1);

namespace Caldera\LuftModel\Tests;

use Caldera\LuftModel\Model\Value;
use PHPUnit\Framework\TestCase;

class ValueTest extends TestCase
{
    private Value $value;

    protected function setUp(): void
    {
        $this->value = new Value();
    }

    public function testInitialStateIsNull(): void
    {
        $this->assertNull($this->value->getStationCode());
        $this->assertNull($this->value->getDateTime());
        $this->assertNull($this->value->getValue());
        $this->assertNull($this->value->getPollutant());
        $this->assertNull($this->value->getTag());
    }

    public function testStationCode(): void
    {
        $this->value->setStationCode('TEST123');

        $this->assertSame('TEST123', $this->value->getStationCode());
    }

    public function testDateTime(): void
    {
        $date = new \DateTime('2024-06-25 15:16:31');
        $this->value->setDateTime($date);

        $this->assertSame($date, $this->value->getDateTime());
    }

    public function testValue(): void
    {
        $this->value->setValue(43.23);

        $this->assertSame(43.23, $this->value->getValue());
    }

    public function testZeroValue(): void
    {
        $this->value->setValue(0.0);

        $this->assertSame(0.0, $this->value->getValue());
    }

    public function testNegativeValue(): void
    {
        $this->value->setValue(-1.5);

        $this->assertSame(-1.5, $this->value->getValue());
    }

    public function testPollutant(): void
    {
        $this->value->setPollutant('CO');

        $this->assertSame('CO', $this->value->getPollutant());
    }

    public function testTag(): void
    {
        $this->value->setTag('Test-Tag');

        $this->assertSame('Test-Tag', $this->value->getTag());
    }

    public function testTagResetToNull(): void
    {
        $this->value->setTag('Test-Tag');
        $this->value->setTag(null);

        $this->assertNull($this->value->getTag());
    }

    public function testSettersReturnSelf(): void
    {
        $this->assertSame($this->value, $this->value->setStationCode('x'));
        $this->assertSame($this->value, $this->value->setDateTime(new \DateTime()));
        $this->assertSame($this->value, $this->value->setValue(1.0));
        $this->assertSame($this->value, $this->value->setPollutant('CO'));
        $this->assertSame($this->value, $this->value->setTag('x'));
    }
}
