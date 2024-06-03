<?php
    $request_url = $_SERVER['REQUEST_URI'];
    $path = parse_url($request_url)['path'];
    $viewDir = '/views/';
    
    switch ($path) {
        case '/':
            require __DIR__ . $viewDir . 'home.php';
            break;
    
        case '/create':
            require __DIR__ . $viewDir . 'create.php';
            break;

        case '/revoke':
            require __DIR__ . $viewDir . 'revoke.php';
            break;

        case '/submit':
            require __DIR__ . $viewDir . 'submit.php';
            break;

        case '/delete':
            require __DIR__ . $viewDir . 'delete.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . $viewDir . '404.php';
    }
?>