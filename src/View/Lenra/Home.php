<?php

namespace App\View\Lenra;

use App\Data\Counter;
use Lenra\App\Components\Base\Builder;
use Lenra\App\Components\Flex;
use Lenra\App\Components\View;
use Lenra\App\Components\View\Definitions\Find;
use Lenra\App\View\LenraComponentRenderer;
use Lenra\App\View\Request;

class Home extends LenraComponentRenderer {
  function render(Request $request): Builder {
        return Flex::builder([
            View::builder("lenra.counter")
                ->find(
                    Find::builder(
                        Counter::class,
                        [
                            "user" => "@me"

                        ]
                    )
                )
                ->props([
                    "text" => "My personnal counter"
                ]),
            View::builder("lenra.counter")
                ->find(
                    Find::builder(
                        Counter::class,
                        [
                            "user" => "global"
                        ]
                    )
                )
                ->props([
                    "text" => "The common counter"
                ]),
        ])
            ->direction("vertical")
            ->spacing(16)
            ->mainAxisAlignment("spaceEvenly")
            ->crossAxisAlignment("center");
    }
}
