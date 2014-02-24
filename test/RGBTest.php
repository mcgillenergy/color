<?php
namespace mcgillenergy\color;

class RGBTest extends \PHPUnit_Framework_TestCase
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\RGB', new RGB(0x000000));
  }

  public function testHexBlack()
  {
    $black = new RGB(0, 0, 0);
    $this->assertEquals($black->hex(), '000000');
  }

  public function testHexWhite()
  {
    $white = new RGB(255, 255, 255);
    $this->assertEquals($white->hex(), 'ffffff');
  }

  public function testValues()
  {
    $white = new RGB(0xffffff);
    $this->assertEquals($white->toArray(), [ 255, 255, 255 ]);
  }

  public function testToRGBA()
  {
    $white = new RGB('ffffff');
    $this->assertEquals($white->toRGBA()->hex(), 'ffffffff');
  }

  public function testToHSV()
  {
    $rgb = new RGB(100, 100, 50);
    $hsv = new HSV(60.0, 0.5, 0.3921568627451);
    $this->assertEquals($rgb->toHSV(), $hsv);
  }
}