<?php

use Lenra\App\Components\Base\Builder;
use Lenra\App\Components\Flex;
use Lenra\App\Components\Text;
use Lenra\App\Components\Button;
use Lenra\App\Components\Container;
use Lenra\App\Components\Flexible;
use Lenra\App\Components\Image;
use Lenra\App\Components\Styles\BoxShadow;
use Lenra\App\Components\Styles\Colors;
use Lenra\App\Components\Styles\Offset;
use Lenra\App\Components\Styles\Padding;
use Lenra\App\Components\Styles\TextStyle;

function handle(ViewRequest $request): Builder {
  return Container::builder(
    Flex::builder([
      Container::builder(
        Image::builder("logo.png")
      )
        ->width(32)
        ->height(32),
      Flexible::builder(
        Container::builder(
          Text::builder("Hello World")
            ->textAlign("center")
            ->style(
              TextStyle::builder()
                ->fontWeight("bold")
                ->fontSize(24)
            )
        )
      )
    ])
      ->fillParent(true)
      ->mainAxisAlignment("spaceBetween")
      ->crossAxisAlignment("center")
      ->padding(Padding::builder()->right(32))
  )
    ->color(Colors::WHITE)
    ->boxShadow(
      BoxShadow::builder()
        ->blurRadius(8)
        ->color(0x1A000000)
        ->offset(
          Offset::builder()
            ->dx(0)
            ->dy(1)
        )
    )
    ->padding(Padding::symmetric(32, 16));
}
