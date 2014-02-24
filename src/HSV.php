<?php
namespace mcgillenergy\color;

class HSV
{
  // $hue: 0.0 .. 360.0, $saturation: 0.0 .. 1.0, $value: 0.0 .. 1.0
  private $hue, $saturation, $value;

  public function __construct($h, $s, $v)
  {
    $this->hue = $h;
    $this->saturation = $s;
    $this->value = $v;
  }

  public function toArray()
  {
    return [ $this->hue, $this->saturation, $this->value ];
  }

  // r,g,b values are from 0 to 1
  // h = [0,360], s = [0,1], v = [0,1]

  public function toRGB()
  {
    $saturation = $this->saturation;
    $value = $this->value;
    if ($saturation == 0)
    {
      return new RGB($value, $value, $value);
    }
    $hue = $this->hue / 60;
    $fact = $hue - floor($hue);
    $p = $value * (1 - $saturation);
    $q = $value * (1 - $saturation * $fact);
    $t = $value * (1 - $saturation * (1 - $fact));

    switch (floor($hue)) {
      case 0:
        $rgb = [ $value, $t, $p ]; break;
  		case 1:
        $rgb = [ $q, $value, $p ]; break;
  		case 2:
        $rgb = [ $p, $value, $t ]; break;
  		case 3:
        $rgb = [ $p, $q, $value ]; break;
  		case 4:
        $rgb = [ $t, $p, $value ]; break;
      default:
        $rgb = [ $value, $p, $q ]; break;
    }
    // trigger_error(var_dump($rgb));
    $normalize = function ($pct)
    {
      return floor($pct * 255);
    };
    return new RGB(array_map($normalize, $rgb));
  }
}