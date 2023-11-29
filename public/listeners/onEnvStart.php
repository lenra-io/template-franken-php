<?php

use Data\Counter;

function handle(ListenerRequest $request) {
    $user = "global";
    $counterColl = $request->api->data()->coll(Counter::class);
    $counters = $counterColl->find(["user" => $user])->wait();

    if (count($counters) == 0) {
        $counterColl->createDoc(new Counter($user, 0))->wait();
    }
}
