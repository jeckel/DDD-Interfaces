<?php

namespace DDDI\Event;

/**
 * Class EventIterator
 * @package DDDI\Event
 */
class EventCollection implements \IteratorAggregate
{
    /** @var []EventInterface */
    protected $events;

    /**
     * EventCollection constructor.
     * @param EventInterface ...$events
     */
    public function __construct(EventInterface ...$events)
    {
        $this->setEvents(...$events);
    }

    /**
     * @param EventInterface ...$events
     * @return EventCollection
     */
    public function setEvents(EventInterface ...$events): EventCollection
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @param EventInterface ...$events
     * @return EventCollection
     */
    public function addEvents(EventInterface ...$events): EventCollection
    {
        $this->events = array_merge($this->events, $events);
        return $this;
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->events);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->events;
    }
}