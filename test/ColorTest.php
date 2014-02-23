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
}
