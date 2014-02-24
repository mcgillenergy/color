<?php
namespace mcgillenergy\color;

class HSVTest extends \PHPUnit_Framework_TestCase
{
  public function testToRGB()
  {
    $rgb = new RGB(100, 100, 50);
    $hsv = new HSV(60, 0.5, 0.3922);
    $this->assertEquals($hsv->toRGB(), $rgb);
  }
  
}