<?php
namespace mcgillenergy\color;

interface Convertible {
  public function toArray();
  public function toRGB();
  public function toRGBA();
  public function toHSV();
  public function toYIQ();
}