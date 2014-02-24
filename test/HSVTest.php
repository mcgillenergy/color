<?php
namespace mcgillenergy\color;

class HSVTest extends \PHPUnit_Framework_TestCase
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\HSV', new HSV(50.0, 0.5, 0.5));
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
  
}