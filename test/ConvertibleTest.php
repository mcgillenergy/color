<?php
namespace mcgillenergy\color;

interface ConvertibleTest 
{
  public function testConstructor();
  public function testToArray();
  public function testToRGB();
  public function testToRGBA();
  public function testToHSV();
  public function testToYIQ();
}