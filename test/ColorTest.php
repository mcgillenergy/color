<?php
namespace mcgillenergy\color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
  public function testConstructor()
  {
    $this->assertInstanceOf('mcgillenergy\\color\\Color', new Color(0, 0, 0));
  }

  public function testRGB()
  {
    $white = Color::RGB(255, 255, 255);
    $rgb = array('r' => 255, 'g' => 255, 'b' => 255);
    $this->assertEquals($white->toRGB(), $rgb);
  }

  public function testHexRGB()
  {
    $white = Color::RGB(0xffffff);
    $rgb = array('r' => 255, 'g' => 255, 'b' => 255);
    $this->assertEquals($white->toRGB(), $rgb);
  }

  public function testRGBtoRGBA()
  {
    $white = Color::RGB(0xffffff);
    $rgba = array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 1.0);
    $this->assertEquals($white->toRGBA(), $rgba);
  }

  public function testRGBA()
  {
    $white = Color::RGBA(255, 255, 255, 1.0);
    $rgba = array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 1.0);
    $this->assertEquals($white->toRGBA(), $rgba);
  }

  public function testHexRGBA()
  {
    $white = Color::RGBA(0xffffff, 1.0);
    $rgba = array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 1.0);
    $this->assertEquals($white->toRGBA(), $rgba);
  }

  public function testRGBAtoRGB()
  {
    $white = Color::RGBA(0xffffff, 1.0);
    $rgb = array('r' => 255, 'g' => 255, 'b' => 255);
    $this->assertEquals($white->toRGB(), $rgb);
  }
}
