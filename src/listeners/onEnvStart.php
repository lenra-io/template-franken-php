<?php
require_once '../classes/Counter.php';

$user = "global";
$counterColl = $request->api->data->coll(Counter::class);
$counters = $counterColl->find([ "user" => $user ]);
if (count($counters) == 0) {
    $counterColl.createDoc(new Counter($user, 0))
}
?>