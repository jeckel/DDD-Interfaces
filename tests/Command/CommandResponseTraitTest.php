<?php
namespace Test\DDDI\Command;

use DDDI\Command\CommandResponseTrait;
use DDDI\Event\EventCollection;
use DDDI\Event\EventInterface;
use PHPUnit\Framework\TestCase;
use Test\DDDI\Command\Fixture\CommandResponse;

/**
 * Class CommandResponseTraitTest
 * @package Test\DDDI\Command
 */
class CommandResponseTraitTest extends TestCase
{
    public function testAckNack()
    {
        $response = new CommandResponse();

        $this->assertTrue($response->isAck());
        $this->assertFalse($response->isNack());
        $this->assertSame($response, $response->nack());
        $this->assertTrue($response->isNack());
        $this->assertFalse($response->isAck());
        $this->assertSame($response, $response->ack());
        $this->assertTrue($response->isAck());
        $this->assertFalse($response->isNack());
    }

    public function testSetGetSingleEvent()
    {
        $event = $this->createMock(EventInterface::class);

        $response = new CommandResponse();
        $this->assertSame($response, $response->setEvents($event));

        $events = $response->getEvents();
        $this->assertInstanceOf(EventCollection::class, $events);
        $this->assertSame($event, $events->toArray()[0]);
    }

    public function testSetGetMultipleEvents()
    {
        $event1 = $this->createMock(EventInterface::class);
        $event2 = $this->createMock(EventInterface::class);

        $response = new CommandResponse();
        $this->assertSame($response, $response->setEvents($event1, $event2));

        $events = $response->getEvents();
        $this->assertInstanceOf(EventCollection::class, $events);
        $this->assertSame($event1, $events->toArray()[0]);
        $this->assertSame($event2, $events->toArray()[1]);
    }
}