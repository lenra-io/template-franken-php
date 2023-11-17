<?php

use Data\Counter;

$json = [
    "routes" => [
        [
            "path" => "/counter/global",
            "view" => [
                "_type" => "view",
                "name" => "counter",
                "find" => [
                    "coll" => Counter::class,
                    "query" => [
                        "user" => "global"
                    ]
                ]
            ]
        ],
        [
            "path" => "/counter/me",
            "view" => [
                "_type" => "view",
                "name" => "counter",
                "find" => [
                    "coll" => Counter::class,
                    "query" => [
                        "user" => "@me"
                    ]
                ]
            ]
        ]
    ]
];

$lenra = [
    "routes" => [
        [
            "path" => "/",
            "view" => [
                "_type" => "view",
                "name" => "lenra.main"
            ]
        ]
    ]
];

$response = [
    "json" => $json,
    "lenra" => $lenra
];
?>