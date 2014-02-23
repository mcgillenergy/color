<?php
namespace mcgillenergy\color;

class RGBATest extends \PHPUnit_Framework_TestCase
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\RGBA', new RGBA(0x000000, 0.0));
  }

  public function testHex()
  {
    $white = new RGBA(255, 255, 255, 1.0);
    $this->assertEquals($white->hex(), 'ffffffff');
  }

  public function testValues()
  {
    $white = new RGBA(0xffffff, 0.5);
    $this->assertEquals($white->values(), [ 255, 255, 255, 0.5 ]);
  }

  public function testToRGB()
  {
    $white = new RGBA('ffffff', 0.25);
    $this->assertEquals($white->toRGB()->hex(), 'ffffff');
  }
}