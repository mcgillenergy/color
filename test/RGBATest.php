<?php
namespace mcgillenergy\color;

class RGBATest extends \PHPUnit_Framework_TestCase implements ColorTest
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

  public function testToArray()
  {
    $white = new RGBA(0xffffff, 0.5);
    $this->assertEquals($white->toArray(), [ 255, 255, 255, 0.5 ]);
  }

  public function testToRGB()
  {
    $white = new RGBA('ffffff', 0.25);
    $this->assertEquals($white->toRGB()->hex(), 'ffffff');
  }

  public function testToRGBA()
  {
    $rgba = new RGBA(0, 0, 0, 0.0);
    $this->assertEquals($rgba, $rgba->toRGBA());
  }

  public function testToHSV()
  {
    $black = new RGBA(0x000000, 0.5);
    $this->assertEquals($black->toRGB()->toHSV(), $black->toHSV());
  }

  public function testToYIQ()
  {
    $rgba = new RGBA(0, 0, 0, 0.5);
    $rgb = $rgba->toRGB();
    $this->assertEquals($rgba->toYIQ(), $rgb->toYIQ());
  }
}