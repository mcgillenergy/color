<?php
namespace mcgillenergy\color;

/*
Convenience methods for converting colors.

$colors = [ 'ff0000', '00ff00', '0000ff' ]
$rgbs = array_map(Color::RGB, $colors)
$hsvs = array_map(Color::HSV, $rgbs)
*/

class Color
{
  public function RGB($color)
  {
    switch ($color) {
      case 'array':
      case 'string':
      case 'integer':
        return new RGB($color);
    }
    return $color->toRGB();
  }

  public function RGBA($color)
  {
    switch ($color) {
      case 'array':
        return new RGBA($color);
    }
    return $color->toRGBA();
  }

  public function HSV($color)
  {
    switch ($color) {
      case 'array':
        return new HSV($color);
    }
    return $color->toHSV();
  }

  public function YIQ($color)
  {
    switch ($color) {
      case 'array':
        return new HSV($color);
    }
    return $color->toYIQ();
  }

  public function XYZ($color)
  {
    switch ($color) {
      case 'array':
        return new XYZ($color);
    }
    return $color->toXYZ();
  }
}