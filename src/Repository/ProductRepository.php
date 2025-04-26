<?php

namespace Acme\Catalog\Repository;

use Acme\Catalog\Model\Product;

class ProductRepository
{
    private array $storage = [];

    public function save(Product $product): void
    {
        $this->storage[$product->getId()] = $product;
    }

    public function find(int $id): ?Product
    {
        return $this->storage[$id] ?? null;
    }

    public function findAll(): array
    {
        return array_values($this->storage);
    }

    public function delete(int $id): void
    {
        unset($this->storage[$id]);
    }
}
