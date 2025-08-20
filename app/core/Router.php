<?php
require_once __DIR__ . '/../Controllers/TaskController.php';

$controller = new TaskController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/index.php') {
    $controller->index();
} elseif ($uri === '/toggle') {
    $controller->toggle();
} else {
    http_response_code(404);
    echo "Página não encontrada";
}
