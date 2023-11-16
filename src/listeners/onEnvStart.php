<?php
use Data\Counter;
use Lenra\App\Collection;

error_log("onEnvStart.php called");
error_log("onEnvStart.php: creating counter for user 'global'");

var_error_log($request);

$user = "global";
/**
 * @var Collection
 */
$counterColl = $request->api->data()->coll(Counter::class);
$counters = $counterColl->find([ "user" => $user ], [])->wait();
if (count($counters) == 0) {
    $counterColl->createDoc(new Counter($user, 0))->wait();
}

function var_error_log( $object=null ){
    ob_start();                    // start buffer capture
    var_dump( $object );           // dump the values
    $contents = ob_get_contents(); // put the buffer into a variable
    ob_end_clean();                // end capture
    error_log( $contents );        // log contents of the result of var_dump( $object )
}
?>