<?php
namespace DDDI\Entity;

/**
 * Interface IdInterface
 * @package DDDI\Entity
 */
interface IdInterface
{
    /**
     * @return IdInterface
     */
    public static function generate(): self;

    /**
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param IdInterface $id
     * @return bool
     */
    public function equals(IdInterface $id): bool;
}