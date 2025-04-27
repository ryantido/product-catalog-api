<?php

namespace Acme\Catalog\Controller;
use Acme\Catalog\Repository\ProductRepository;
use Acme\Catalog\Model\Product;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class ProductController {
    private ProductRepository $repo;
    public function __construct() { $this->repo = new ProductRepository(); }
    public function list(): array { return $this->repo->findAll(); }
    public function create(array $data): Product {
        $id = $data['id'] ?? time();
        $p = new Product($id, $data['name'], $data['price']);
        $this->repo->save($p);
        return $p;
    }
    public function read(int $id): ?Product { return $this->repo->find($id); }
    public function update(int $id, array $data): ?Product {
        $p = new Product($id, $data['name'], $data['price']);
        $this->repo->save($p); return $p;
    }
    public function delete(int $id): void { $this->repo->delete($id); }
}
