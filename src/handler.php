<?php
class ViewRequest {
    public function __construct(
        public $data,
        public $props,
        public $context
    ) {}
}

function handleRequest($request) {
    // Check if data matches one of the expected queries
    if (isset($request->view)) {
        $response = includeFile('views', $request->view, new ViewRequest(
            $request->data ?? [],
            $request->props ?? [],
            $request->context ?? [],
        ));
        if (isset($response)) {
            echo json_encode($response);
        } else {
            headers_send(500);
            // $GLOBALS['http_response_code'] = 500;
            throw new Exception('No response was generated');
        }
    } 
    elseif (isset($request->listener)) {
        echo json_encode([
            'listener' => $request->listener,
        ]);
    } 
    elseif (isset($request->resource)) {
        echo json_encode([
            'resource' => $request->resource,
        ]);
    } else {
        echo json_encode([
            'manifest' => 'yes',
        ]);
    }
}

function includeFile($type, $name, $request) {
    $path = $type . '/' . str_replace(".", "/", $name) . '.php';
    if (include $path) {
        return $response;
    } else {
        throw new Exception('Could not include the file: ' . $path);
    }
}

?>