<?php
namespace DDDI\Command;

use DDDI\Event\EventCollection;
use DDDI\Event\EventInterface;

/**
 * Interface CommandResponseInterface
 * @package DDDI\Command
 */
interface CommandResponseInterface
{
    /**
     * @return bool
     */
    public function isAck(): bool;

    /**
     * @return bool
     */
    public function isNack(): bool;

    /**
     * @return null|iterable
     */
    public function getEvents(): ?iterable;
}