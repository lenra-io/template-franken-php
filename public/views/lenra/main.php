<?php

use Lenra\App\Components\Base\Builder;
use Lenra\App\Components\Flex;
use Lenra\App\Components\View;

function handle(ViewRequest $request): Builder {
  return Flex::builder([
    View::builder("lenra.menu"),
    View::builder("lenra.home")
  ])
    ->direction("vertical")
    ->scroll(true)
    ->spacing(4)
    ->crossAxisAlignment("center");
}
