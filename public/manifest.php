<?php

use Data\Counter;
use Lenra\App\Components\View;
use Lenra\App\Components\View\Definitions\Find;
use Lenra\App\Manifest;
use Lenra\App\Manifest\Exposer;
use Lenra\App\Manifest\Route;

function handle(): Manifest {
    return (new Manifest())
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
