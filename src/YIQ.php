<?php
namespace mcgillenergy\color;

class YIQ implements Convertible {
  // $y: 0.0 .. 1.0, $i: -0.5957 .. 0.5957, $q: -0.5226 .. 0.5226
  private $y, $i, $q;

  public function __construct(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 3) {
      $args = func_get_args();
    } else if ($argc == 1) {
      $args = func_get_arg(0);
    } else {
      trigger_error('Usage: `YIQ(0.0, 0.0, 0.0)`');
    }
    $this->y = $args[0];
    $this->i = $args[1];
    $this->q = $args[2];
  }

  public function toArray()
  {
    return [ $this->y, $this->i, $this->q ];
  }

  public function toRGB()
  {
    $y = $this->y;
    $i = $this->i;
    $q = $this->q;
    $r = $y + 0.9563 * $i + 0.6210 * $q;
    $g = $y - 0.2721 * $i - 0.6474 * $q;
    $b = $y - 1.1070 * $i + 1.7046 * $q;
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
    return new YIQ($this->y, $this->i, $this->q);
  }
}