<?php
namespace mcgillenergy\color;

class XYZ
{
  private $x, $y, $z;

  public function __construct(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 3) {
      $args = func_get_args();
    } else if ($argc == 1) {
      $args = func_get_arg(0);
    } else {
      trigger_error('Usage: `XYZ(0.0, 0.0, 0.0)`');
    }
    $this->x = $args[0];
    $this->y = $args[1];
    $this->z = $args[2];
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

  public function toRGBA()
  {
    return $this->toRGB()->toRGBA();
  }

  public function toHSV()
  {
    return $this->toRGB()->toHSV();
  }

  public function toYIQ()
  {
    return $this->toRGB()->toYIQ();
  }

  public function toXYZ()
  {
    return new XYZ($this->x, $this->y, $this->z);
  }
}