<?php
namespace mcgillenergy\color;

class HSVTest extends \PHPUnit_Framework_TestCase implements ColorTest
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\HSV', new HSV(50.0, 0.5, 0.5));
  }

  public function testToArray()
  {
    $hsv = new HSV(90, 0.3, 0.3);
    $this->assertEquals([ 90, 0.3, 0.3 ], $hsv->toArray());
  }

  public function testToRGB()
  {
    $rgb = new RGB(100, 100, 50);
    $hsv = new HSV(60, 0.5, 0.3922);
    $this->assertEquals($hsv->toRGB(), $rgb);
  }

  public function testToRGBA()
  {
    $rgba = new RGBA(100, 100, 50, 1.0);
    $hsv = new HSV(60, 0.5, 0.3922);
    $this->assertEquals($hsv->toRGBA(), $rgba);
  }

  public function testToHSV()
  {
    $hsv = new HSV(15, 9.0, 5.0);
    $this->assertEquals($hsv, $hsv->toHSV());
  }

  public function testToYIQ()
  {
    $hsv = new HSV(90, 0.5, 0.5);
    $rgb = $hsv->toRGB();
    $this->assertEquals($hsv->toYIQ(), $rgb->toYIQ());
  }
}