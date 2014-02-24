<?php
namespace mcgillenergy\color;

class YIQ implements Color {
  // $y: 0.0 .. 1.0, $i: -0.5957 .. 0.5957, $q: -0.5226 .. 0.5226
  private $y, $i, $q;

  public function __construct($y, $i, $q)
  {
    $this->y = $y;
    $this->i = $i;
    $this->q = $q;
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