<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require __DIR__ . '/../vendor/autoload.php';

use Acme\Catalog\Controller\ProductController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

$controller = new ProductController();

try {
    if ($path === '/' && $method === 'GET') {
        http_response_code(404);
        echo json_encode(['error' => 'Not found', 'path' => $path, 'method' => $method]);
    } elseif ($path === '/products' && $method === 'GET') {
        $products = $controller->list();
        if (empty($products)) {
            echo json_encode(['message' => 'Aucun produit disponible.']);
        } else {
            echo json_encode($products);
        }
    } elseif ($path === '/products' && $method === 'POST') {
        echo json_encode($controller->create($input));
    } elseif (preg_match('#^/products/(\d+)$#', $path, $m)) {
        $id = (int)$m[1];
        if ($method === 'GET') echo json_encode($controller->read($id));
        if ($method === 'PUT') echo json_encode($controller->update($id, $input));
        if ($method === 'DELETE') { $controller->delete($id); echo ''; }
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Not found', 'path' => $path, 'method' => $method]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
