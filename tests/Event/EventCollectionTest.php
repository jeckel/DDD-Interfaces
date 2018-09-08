<?php

namespace Test\DDDI\Event;

use DDDI\Event\EventCollection;
use DDDI\Event\EventInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class EventCollectionTest
 * @package Test\DDDI\Event
 */
class EventCollectionTest extends TestCase
{

    /**
     * @test toArray
     */
    public function testToArray()
    {
        $event1 = $this->createMock(EventInterface::class);
        $event2 = $this->createMock(EventInterface::class);
        $collection = new EventCollection($event1, $event2);

        $this->assertEquals([$event1, $event2], $collection->toArray());
    }

    /**
     * @test setEvents
     */
    public function testSetEvents()
    {
        $event1 = $this->createMock(EventInterface::class);
        $event2 = $this->createMock(EventInterface::class);
        $collection = new EventCollection();
        $collection->setEvents($event1, $event2);

        $this->assertEquals([$event1, $event2], $collection->toArray());

        // setEvents should reset the list
        $collection->setEvents($event2);
        $this->assertEquals([$event2], $collection->toArray());
    }

    /**
     * @test getIterator
     */
    public function testGetIterator()
    {
        $event1 = $this->createMock(EventInterface::class);
        $event2 = $this->createMock(EventInterface::class);
        $collection = new EventCollection($event1, $event2);

        foreach($collection as $i=>$event)
        {
            if ($i == 0) $this->assertSame($event1, $event);
            if ($i == 1) $this->assertSame($event2, $event);
        }
    }

    /**
     * @test addEvent
     */
    public function testAddEvent()
    {
        $event1 = $this->createMock(EventInterface::class);
        $event2 = $this->createMock(EventInterface::class);
        $collection = new EventCollection();
        $collection->setEvents($event1);

        $this->assertEquals([$event1], $collection->toArray());

        // addEvents should not reset the list
        $collection->addEvents($event2);
        $this->assertEquals([$event1, $event2], $collection->toArray());

    }
}
