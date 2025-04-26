<?php
namespace Acme\Catalog\Controller;

use Acme\Catalog\Repository\ProductRepository;
use Acme\Catalog\Model\Product;

class ProductController
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new ProductRepository();
    }

    public function create(array $data): Product
    {
        $product = new Product($data['id'], $data['name'], $data['price']);
        $this->repo->save($product);
        return $product;
    }

}
