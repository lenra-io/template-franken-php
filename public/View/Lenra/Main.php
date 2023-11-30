<?php

namespace App\View\Lenra;

use Lenra\App\Components\Base\Builder;
use Lenra\App\Components\Flex;
use Lenra\App\Components\View;
use Lenra\App\View\LenraComponentRenderer;
use Lenra\App\View\Request;

class Main extends LenraComponentRenderer {
  function render(Request $request): Builder {
    return Flex::builder([
      View::builder("lenra.menu"),
      View::builder("lenra.home")
    ])
      ->direction("vertical")
      ->scroll(true)
      ->spacing(4)
      ->crossAxisAlignment("center");
  }
}
