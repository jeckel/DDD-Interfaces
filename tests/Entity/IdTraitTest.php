<?php
namespace Test\DDDI\Entity;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Test\DDDI\Entity\Fixture\MyId;

/**
 * Class Test
 * @package DDDI\Entity
 */
class IdTraitTest extends TestCase
{
    /**
     * @throws \Assert\AssertionFailedException
     * @throws \Exception
     */
    public function testConstruct()
    {
        $value = (string) Uuid::uuid4();
        $id = new MyId($value);
        $this->assertSame($value, $id->getValue());
    }

    /**
     * @expectedException  \Assert\AssertionFailedException
     * @expectedExceptionMessage Invalid id: foobar
     */
    public function testConstructInvalidValue()
    {
        new MyId('foobar');
    }

    /**
     * @throws \Assert\AssertionFailedException
     */
    public function testGenerate()
    {
        $id = MyId::generate();

        $this->assertInstanceOf(MyId::class, $id);
        $this->assertTrue(Uuid::isValid($id->getValue()));
    }

    /**
     * @throws \Exception
     */
    public function testIsValid()
    {
        $this->assertTrue(MyId::isValid(Uuid::uuid4()));
        $this->assertFalse(MyId::isValid('foobar'));
    }

    /**
     * @throws \Assert\AssertionFailedException
     * @throws \Exception
     */
    public function testEquals()
    {
        $value = Uuid::uuid4();

        $id1 = new MyId($value);
        $id2 = new MyId($value);

        $this->assertNotSame($id1, $id2);
        $this->assertTrue($id1->equals($id2));
        $this->assertTrue($id2->equals($id1));

        $id3 = new MyId(Uuid::uuid4());
        $this->assertFalse($id1->equals($id3));
    }

    /**
     * @throws \Assert\AssertionFailedException
     * @throws \Exception
     */
    public function testToString()
    {
        $value = (string) Uuid::uuid4();
        $id = new MyId($value);

        $this->assertEquals($value, (string) $id);
    }
}
