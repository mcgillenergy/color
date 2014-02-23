<?php
namespace mcgillenergy\color;

class RGBTest extends \PHPUnit_Framework_TestCase
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\RGB', new RGB(0x000000));
  }

  public function testHex()
  {
    $white = new RGB(255, 255, 255);
    $this->assertEquals($white->hex(), 'ffffff');
  }

  public function testValues()
  {
    $white = new RGB(0xffffff);
    $this->assertEquals($white->values(), [ 255, 255, 255 ]);
  }

  public function testToRGBA()
  {
    $white = new RGB('ffffff');
    $this->assertEquals($white->toRGBA()->hex(), 'ffffffff');
  }
}