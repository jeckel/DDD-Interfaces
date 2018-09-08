<?php
namespace DDDI\Entity;

/**
 * Interface IdInterface
 * @package DDDI\Entity
 */
interface IdInterface
{
    public static function generate(): self;

    public static function isValid(string $value): bool;

    public function getValue(): string;

    public function equals(IdInterface $id): bool;
}