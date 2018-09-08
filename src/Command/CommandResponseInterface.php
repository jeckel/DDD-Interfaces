<?php
namespace DDDI\Command;

use DDDI\Event\EventInterface;

/**
 * Interface CommandResponseInterface
 * @package DDDI\Command
 */
interface CommandResponseInterface
{
    /**
     * @param EventInterface ...$events
     * @return self
     */
    public function setEvents(EventInterface ...$events): self;

    /**
     * @return bool
     */
    public function isSuccess(): bool;
}