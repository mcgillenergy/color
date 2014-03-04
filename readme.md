# Color

We needed to overlay a color on a map based on energy readings for mcgillenergy/energymap. We chose to scale readings in the possible domain to an arc of the HSV color wheel, then convert to a KML-compatible ARGB color.

`Color` does much more though. Right now you can create and convert between `HSV`, `RGB`, `RGBA`, `XYZ`, `YIQ` color profiles. Alpha transparency is lost when converting to opaque color profiles, much like PNG to JPG conversion. Also, some accuracy is lost between conversions. 

Each color profile embodies a class. Instantiation is fairly flexible. 

```
$white = new RGB(0xffffff);
$red = new RGB(255, 0, 0);
$black = new RGB([ 0, 0, 0 ]);
```

Instead of writing out conversion functions for mapping over arrays, use built-in static coersion methods on the `Color` class. They accept arrays as well, which is nice for converting between application logic and color processing. 

```
$rgb_colors = [ [ 0, 0, 20 ], [ 30, 215, 87 ] ];
$hsv_colors = array_map(Color::HSV, array_map(Color::RGB, $rgb_colors));
```

Below are some cool things you can do with different color profiles. 

### Black & White

The YIQ color profile is used in televion. Y is light intensity, I and Q define the color plane. Setting I and Q to 0 is kinda like black and white television. 

```php
$black_and_white = function($color)
{
  $shade = new YIQ($color->toYIQ()->y, 0, 0);
  return $shade->toRGB();
};

$colors = array_map(Color::RGB, $pixels);
$shades = array_map($black_and_white, $colors);
```

### Lighten or Darken

More YIQ! To lighten or darken, the color remains the same, while the intensity is changed. Higher order filters ftw. 

```php
$lighen = function ($pct)
{
  $filter = function ($color)
  {
    $color = $color->toYIQ();
    $light = new YIQ($color->y * (1 + $pct), $color->i, $color->q);
    return $light->toRGB();
  };
  return $filter;
};

// $darken would replace (1 + $pct) with (1 - $pct)

$colors = array_map(Color::RGB, $pixels);
$pastels = array_map($lighen(0.15), $colors);
```

### Unique Colors

Need game pieces for your new app Catan? Look no further than HSV.

```php
$player_colors_for = function ($count)
{
  $degrees = 360.0 / $count;
  $colors = [];
  for ($i = 0; $i < $count; $i ++)
  {
    array_push($colors, new HSV($degrees * $i, 0.6, 0.6));
  }
  return array_map(Color::RGB, $colors);
}

$original = $player_colors_for(4);
$extended_expansion = $player_colors_for(10);
```

### Notes

Install with composer.

```
$ composer require mcgillenergy/color --save
```

Please contribute new ideas! If your life could be easier, it's a bug. Brand new to PHP as well, so feedback on conventions is extra welcome. 

To get up and running, clone the repository, install dependencies, and run the test suite. 

```
$ git clone mcgillenergy/color && cd color
$ composer install
$ phpunit
```

**MIT License** 
