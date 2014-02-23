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

  public function values()
  {
    $red = $this->rgb >> 16;
    $green = ($this->rgb >> 8) & 0xff;
    $blue = $this->rgb & 0xff;
    return [ $red, $green, $blue ];
  }

  public function toRGB()
  {
    return $this;
  }

  public function toRGBA()
  {
    return new RGBA($this->rgb, 1.0);
  }
}