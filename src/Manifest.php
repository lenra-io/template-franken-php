<?php

namespace App;

use App\Data\Counter;
use Lenra\App\Components\View;
use Lenra\App\Components\View\Definitions\Find;
use Lenra\App\Manifest as AppManifest;
use Lenra\App\Manifest\Exposer;
use Lenra\App\Manifest\Route;

class Manifest extends \Lenra\App\Manifest\Builder {
    protected function build(): AppManifest {
        return (new AppManifest())
            ->json(
                new Exposer([
                    new Route(
                        "/counter/global",
                        View::builder("counter")
                            ->find(
                                Find::builder(
                                    Counter::class,
                                    [
                                        "user" => "global"
                                    ]
                                )
                            ),
                    ),
                    new Route(
                        "/counter/me",
                        View::builder("counter")
                            ->find(
                                Find::builder(
                                    Counter::class,
                                    [
                                        "user" => "@me"
                                    ]
                                )
                            ),
                    )
                ])
            )
            ->lenra(
                new Exposer([
                    new Route(
                        "/",
                        View::builder("lenra.main"),
                    )
                ])
            );
    }
}
