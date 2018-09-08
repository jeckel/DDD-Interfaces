<?php
namespace DDDI\Command;
use DDDI\Event\EventCollection;
use DDDI\Event\EventInterface;

/**
 * Class CommandResponseTrait
 * @package DDDI\Command
 */
trait CommandResponseTrait
{
    /** @var bool */
    protected $ack = true;

    /** @var EventCollection|null */
    protected $events;

    /**
     * @return CommandResponseInterface
     */
    public function ack(): CommandResponseInterface
    {
        $this->ack = true;
        return $this;
    }

    /**
     * @return CommandResponseInterface
     */
    public function nack(): CommandResponseInterface
    {
        $this->ack = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAck(): bool
    {
        return $this->ack;
    }

    /**
     * @return bool
     */
    public function isNack(): bool
    {
        return ! $this->ack;
    }

    /**
     * @param EventInterface ...$events
     * @return CommandResponseInterface
     */
    public function setEvents(EventInterface ...$events): CommandResponseInterface
    {
        if (! empty($events)) {
            $this->events = new EventCollection(...$events);
        }
        return $this;
    }

    /**
     * @return EventCollection|null
     */
    public function getEvents(): ?EventCollection
    {
        return $this->events;
    }
}