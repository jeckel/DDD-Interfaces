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

    }

    /**
     * @test getIterator
     */
    public function testGetIterator()
    {

    }

    /**
     * @test addEvent
     */
    public function testAddEvent()
    {

    }
}
