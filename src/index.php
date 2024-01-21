<?php

$max_requests = 100;

// Prevent worker script termination when a client connection is interrupted
ignore_user_abort(true);

require_once __DIR__ . '/../vendor/autoload.php';

$handler = static function () {
    \Lenra\App\Logger::log("handle request");
    \Lenra\App\Runner::run();
};

$lock_file = '/tmp/.lock';
if (!file_exists($lock_file)) {
    file_put_contents($lock_file, "\n");
    \Lenra\App\Logger::log("lock file created");
}

try {
for($nbRequests = 0, $running = true; $nbRequests < $max_requests && $running; ++$nbRequests) {
    $running = \frankenphp_handle_request($handler);

    // Call the garbage collector to reduce the chances of it being triggered in the middle of a page generation
    gc_collect_cycles();
}
} catch (Exception $e) {
    \Lenra\App\Logger::log('Exception reçue : ' .  $e->getMessage());
}
