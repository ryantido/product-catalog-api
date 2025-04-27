<?php

namespace Acme\Catalog\Repository;
use Acme\Catalog\Model\Product;

class ProductRepository {
    private string $filePath;

    public function __construct() {
        $this->filePath = __DIR__ . '/../../data/products.json';
        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function save(Product $p): void {
        $products = $this->findAll();
        $products[$p->id] = $p;
        file_put_contents($this->filePath, json_encode($products));
    }

    public function findAll(): array {
        $data = json_decode(file_get_contents($this->filePath), true);
        return array_map(fn($item) => new Product($item['id'], $item['name'], $item['price']), $data);
    }

    public function find(int $id): ?Product {
        $products = $this->findAll();
        return $products[$id] ?? null;
    }

    public function delete(int $id): void {
        $products = $this->findAll();
        unset($products[$id]);
        file_put_contents($this->filePath, json_encode($products));
    }
}
