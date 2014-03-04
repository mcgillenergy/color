<?php
namespace mcgillenergy\color;

class XYZTest extends \PHPUnit_Framework_TestCase implements ConvertibleTest
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\XYZ', new XYZ(0.5, 0.25, 0.25));
    
  }

  public function testToArray()
  {
    $xyz = new XYZ(0.1, 0.2, 0.3);
    $this->assertEquals([ 0.1, 0.2, 0.3 ], $xyz->toArray());
  }

  public function testToRGB()
  {
    $xyz = new XYZ(0.5, 0.9, 0.25);
    $this->assertEquals(new RGB(29, 53, 27 ), $xyz->toRGB());
  }

  public function testToRGBA()
  {
    $xyz = new XYZ(0.5, 0.9, 0.25);
    $rgb = $xyz->toRGB();
    $this->assertEquals($rgb->toRGBA(), $xyz->toRGBA());
  }

  public function testToHSV()
  {
    $xyz = new XYZ(0.5, 0.9, 0.25);
    $rgb = $xyz->toRGB();
    $this->assertEquals($rgb->toHSV(), $xyz->toHSV());
  }

  public function testToYIQ()
  {
    $xyz = new XYZ(0.5, 0.9, 0.25);
    $rgb = $xyz->toRGB();
    $this->assertEquals($rgb->toYIQ(), $xyz->toYIQ());
  }

  public function testToXYZ()
  {
    $xyz = new XYZ(0.5, 0.9, 0.25);
    $this->assertEquals($xyz->toXYZ(), $xyz);
  }
}