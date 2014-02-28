<?php
namespace mcgillenergy\color;

class RGBA extends RGB implements Convertible
{
  // 0.0 .. 1.0
  private $alpha;

  public function __construct(/* args */)
  {
    $argc = func_num_args();
    if ($argc == 4) {
      parent::__construct(array_slice(func_get_args(), 0, 3));
      $this->alpha = func_get_arg(3);
    } elseif ($argc == 2) {
      parent::__construct(func_get_arg(0));
      $this->alpha = func_get_arg(1);
    } else {
      trigger_error('Usage: `RGB(255, 255, 255, 1.0)` or `RGB(0xffffff, 1.0)` or `RGB("ffffff", 1.0)`');
    }
  }

  public function hex()
  {
    $alpha = floor($this->alpha * 0xff);
    return parent::hex() . dechex($alpha);
  }

  public function toArray()
  {
    $values = parent::toArray();
    array_push($values, $this->alpha);
    return $values;
  }

  public function toRGB()
  {
    return new RGB(parent::red(), parent::blue(), parent::green());
  }

  public function toRGBA()
  {
    return new RGBA(parent::red(), parent::blue(), parent::green(), $this->alpha);
  }
}