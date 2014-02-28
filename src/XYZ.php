<?php
namespace mcgillenergy\color;

class XYZ
{
  private $x, $y, $z;

  public function __construct($x, $y, $z)
  {
    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  public function toArray()
  {
    return [ $this->x, $this->y, $this->z ];
  }

  public function toRGB()
  {
    $x = $this->x;
    $y = $this->y;
    $z = $this->z;
    $r = +3.240479 * $x - 1.537150 * $y - 0.498535 * $z;
    $g = -0.969256 * $x + 1.875992 * $y + 0.041556 * $z;
    $b = +0.055648 * $x - 0.204043 * $y + 1.057311 * $z;
    return new RGB(RGB::normalize([ $r, $g, $b ]));
  }
}