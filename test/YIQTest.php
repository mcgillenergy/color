<?php
namespace mcgillenergy\color;

class YIQTest extends \PHPUnit_Framework_TestCase implements ConvertibleTest
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\YIQ', new YIQ(0.5, 0.25, 0.25));
  }

  public function testToArray()
  {
    $yiq = new YIQ(0.5, 0.5, 0.5);    
    $this->assertEquals([ 0.5, 0.5, 0.5 ], $yiq->toArray());
  }

  public function testToRGB()
  {
    $yiq = new YIQ(0.5, 0.25, 0.25);
    $rgb = new RGB(228, 68, 165);
    $this->assertEquals($yiq->toRGB(), $rgb);
  }

  public function testToRGBA()
  {
    $yiq = new YIQ(0.5, 0.25, 0.25);
    $rgb = $yiq->toRGB();
    $this->assertEquals($rgb->toRGBA(), $yiq->toRGBA());
  }

  public function testToHSV()
  {
    $yiq = new YIQ(0.5, 0.25, 0.25);
    $rgb = $yiq->toRGB();
    $this->assertEquals($rgb->toHSV(), $yiq->toHSV());
  }

  public function testToYIQ()
  {
    $yiq = new YIQ(0.3, 0.3, 0.3);
    $this->assertEquals($yiq, $yiq->toYIQ());
  }
}
