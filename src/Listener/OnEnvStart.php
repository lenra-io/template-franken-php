<?php

namespace App\Listener;

use Data\Counter;
use Lenra\App\Listener\Handler;
use Lenra\App\Listener\Request;

class OnEnvStart extends Handler {
    function handle(Request $request) {
        $user = "global";
        $counterColl = $request->api->data()->coll(Counter::class);
        $counters = $counterColl->find(["user" => $user])->wait();

        if (count($counters) == 0) {
            $counterColl->createDoc(new Counter($user, 0))->wait();
        }
    }
}
