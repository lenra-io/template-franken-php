<?php

namespace App\Listener;

use App\Data\Counter;
use Lenra\App\Listener\Handler;
use Lenra\App\Listener\Request;

class OnUserFirstJoin extends Handler {
    function handle(Request $request) {
        $user = "@me";
        $counterColl = $request->api->data()->coll(Counter::class);
        $counters = $counterColl->find(["user" => $user])->wait();

        if (count($counters) == 0) {
            $counterColl->createDoc(new Counter($user, 0))->wait();
        }
    }
}
