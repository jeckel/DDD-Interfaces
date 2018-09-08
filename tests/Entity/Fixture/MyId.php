<?php
namespace Test\DDDI\Entity\Fixture;

use DDDI\Entity\IdInterface;
use DDDI\Entity\IdTrait;

/**
 * Class MyId
 * @package Test\DDDI\Entity\Fixture
 */
class MyId implements IdInterface
{
    use IdTrait;
}