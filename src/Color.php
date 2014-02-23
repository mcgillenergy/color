<?php
namespace mcgillenergy\color;

class Color
{
  private $red, $green, $blue, $alpha;

  // rgb: 0..255
  public function __construct($rgba)
  {
    $this->red = $rgba[0];
    $this->green = $rgba[1];
    $this->blue = $rgba[2];
    $this->alpha = $rgba[3];
  }

  // $white = Color::RGB(0xffffff)
  // $white = COlor::RGB(255, 255, 255)
  public static function RGB(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 3) {
      $rgba = func_get_args();
    } elseif ($argc == 1) {
      $rgba = self::fromHex(func_get_arg(0));
    } else {
      trigger_error('Color::RGB(255, 255, 255)  or  Color::RGB(0xffffff)');
    }
    array_push($rgba, 1.0);
    return new Color($rgba);
  }

  public static function RGBA(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 4) {
      $rgba = func_get_args();
    } else if ($argc == 2) {
      $rgba = self::fromHex(func_get_arg(0));
      array_push($rgba, func_get_arg(1));
    } else {
      trigger_error('Color::RGBA(255, 255, 255, 1.0)  or  Color::RGB(0xffffff, 1.0)');
    }
    return new Color($rgba);
  }

  private static function fromHex($hex)
  {
    $rgb = array();
    while ($hex > 0)
    {
      array_push($rgb, $hex & 0xff);
      $hex >>= 8;
    }
    return $rgb;
  }

  public function toRGB()
  {
    return array('r' => $this->red, 'g' => $this->green, 'b' => $this->blue);
  }

  public function toRGBA()
  {
    return $this->toRGB() + array('a' => $this->alpha);
  }
}