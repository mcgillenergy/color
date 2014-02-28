<?php
namespace mcgillenergy\color;

class RGBTest extends \PHPUnit_Framework_TestCase implements ConvertibleTest
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\RGB', new RGB(0x000000));
  }

  public function testRed()
  {
    $rgb = new RGB(0, 1, 1);
    $this->assertEquals(0, $rgb->red());
  }

  public function testGreen()
  {
    $rgb = new RGB(1, 0, 1);
    $this->assertEquals(0, $rgb->green());
  }

  public function testBlue()
  {
    $rgb = new RGB(1, 1, 0);
    $this->assertEquals(0, $rgb->blue());
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

  public function testToArray()
  {
    $white = new RGB(0xffffff);
    $this->assertEquals($white->toArray(), [ 255, 255, 255 ]);
  }

  public function testToRGB()
  {
    $rgb = new RGB(5, 5, 5);
    $this->assertEquals($rgb, $rgb->toRGB());
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

  public function testToYIQ()
  {
    $rgb = new RGB(50, 50, 20);
    $yiq = new YIQ(0.18266666666667, 0.037764705882353, -0.036588235294118);
    $this->assertEquals($yiq, $rgb->toYIQ());
  }
}