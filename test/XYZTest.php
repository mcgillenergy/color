<?php
namespace mcgillenergy\color;

class XYZTest extends \PHPUnit_Framework_TestCase implements ConvertibleTest
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\YIQ', new YIQ(0.5, 0.25, 0.25));
    
  }

  public function testToArray()
  {
    $xyz = new XYZ(0.1, 0.2, 0.3);
    $this->assertEquals([ 0.1, 0.2, 0.3 ], $xyz->toArray());
  }

  public function testToRGB()
  {
    
  }

  public function testToRGBA()
  {
    
  }

  public function testToHSV()
  {
  
  }

  public function testToYIQ()
  {
    
  }

  public function testToXYZ()
  {
    
  }
}