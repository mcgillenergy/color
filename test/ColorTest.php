<?php
namespace mcgillenergy\color;

interface ColorTest 
{
  public function testConstructor();
  public function testToArray();
  public function testToRGB();
  public function testToRGBA();
  public function testToHSV();
  public function testToYIQ();
}