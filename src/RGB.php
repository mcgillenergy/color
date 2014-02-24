<?php
namespace mcgillenergy\color;

class RGB
{
  // 0x000000 .. 0xffffff
  private $rgb;


  // $white = new RGB(0xffffff)
  // $white = new RGB(255, 255, 255)
  public function __construct(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 3) {
      $this->fromValues(func_get_args());
    } elseif ($argc == 1) {
      $arg = func_get_arg(0);
      $type = gettype($arg);
      switch ($type) {
        case 'array':
          $this->fromValues($arg); break;
        case 'string':        
          $this->fromString($arg); break;
        case 'integer':
          $this->fromHex($arg); break;
      }  
    } else {
      trigger_error('Usage: `RGB(255, 255, 255)` or `RGB(0xffffff)` or `RGB("ffffff")`');
    }
  }

  private function fromHex($int)
  {
    $this->rgb = $int;
  }

  private function fromString($hex)
  {
    $this->fromHex(hexdec($hex));
  }

  private function fromValues($values)
  {
    $this->fromHex(($values[0] << 16) + ($values[1] << 8) + $values[2]);
  }

  public function hex()
  {
    return dechex($this->rgb);
  }

  public function toArray()
  {
    return [ $this->red(), $this->green(), $this->blue() ];
  }

  public function toRGB()
  {
    return $this;
  }

  public function toRGBA()
  {
    return new RGBA($this->rgb, 1.0);
  }

  public function red()
  {
    return $this->rgb >> 16;
  }

  public function green()
  {
    return ($this->rgb >> 8) & 0xff;
  }

  public function blue()
  {
    return $this->rgb & 0xff;
  }

  public function toHSV()
  {
    $r = $this->red() / 255.0;
    $g = $this->green() / 255.0;
    $b = $this->blue() / 255.0;

    $min = min($r, $g, $b);
    $max = max($r, $g, $b);
    $delta = $max - $min;

    $value = $max;

    if ($max != 0)
    {
      $saturation = $delta / $max;
    } 
    else
    {
      return new HSV(0, 0, $value);
    }
    if ($r == $max)
    {
      $hue = ($g - $b) / $delta;
    }
    elseif ($g == $max)
    {
      $hue = 2 + ($b - $r) / $delta;
    }
    else
    {
      $hue = 4 + ($r - $g) / $delta;
    }
    $hue *= 60;
    if ($hue < 0) $hue += 360;
    return new HSV($hue, $saturation, $value);
  }
}