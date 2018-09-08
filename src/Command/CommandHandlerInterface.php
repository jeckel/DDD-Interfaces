<?php
namespace DDDI\Command;

/**
 * Interface CommandHandlerInterface
 * @package DDDI\Command
 */
interface CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return CommandResponseInterface
     */
    public function handle(CommandInterface $command): CommandResponseInterface;

    /**
     * @return string
     */
    public function listenTo(): string;
}