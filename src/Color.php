<?php
namespace mcgillenergy\color;

class Color
{
  private $red, $green, $blue;

  // rgb: 0..255
  public function __construct($rgb)
  {    
    $this->red = $rgb[0];
    $this->green = $rgb[1];
    $this->blue = $rgb[2];
  }

  // $white = Color::RGB(0xffffff)
  // $white = COlor::RGB(255, 255, 255)
  public static function RGB(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 3) {
      return new Color(func_get_args());
    } elseif ($argc == 1) {
      $hex = func_get_arg(0);
      $rgb = array();
      while ($hex > 0)
      {
        array_push($rgb, $hex & 0xff);
        $hex >>= 8;
      }
      return new Color($rgb);
    }
  }

  public function toRGB()
  {
    return array('r' => $this->red, 'g' => $this->green, 'b' => $this->blue);
  }
}