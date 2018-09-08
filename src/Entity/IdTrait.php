<?php
namespace DDDI\Entity;

use Assert\Assertion;
use Ramsey\Uuid\Uuid;

/**
 * Trait IdTrait
 * @package Entity
 */
trait IdTrait
{
    /** @var string */
    protected $value;

    /**
     * IdTrait constructor.
     * @param string $value
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $value)
    {
        Assertion::true(self::isValid($value), 'Invalid id: '.$value);
        $this->value = $value;
    }

    /**
     * @return self
     * @throws \Exception
     * @throws \Assert\AssertionFailedException
     */
    public static function generate(): IdInterface
    {
        return new self((string) Uuid::uuid4());
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool
    {
        return Uuid::isValid($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param IdInterface $id
     * @return bool
     */
    public function equals(IdInterface $id): bool
    {
        return get_class($id) == self::class && $id->getValue() === $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}