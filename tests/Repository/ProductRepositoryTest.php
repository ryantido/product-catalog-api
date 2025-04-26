<?php
use PHPUnit\Framework\TestCase;
use Acme\Catalog\Model\Product;
use Acme\Catalog\Repository\ProductRepository;

class ProductRepositoryTest extends TestCase
{
    public function testSaveAndFind(): void
    {
        $repo = new ProductRepository();
        $product = new Product(1, 'Test', 9.99);
        $repo->save($product);
        $this->assertSame($product, $repo->find(1));
    }

    public function testDelete(): void
    {
        $repo = new ProductRepository();
        $product = new Product(2, 'ToDelete', 5.00);
        $repo->save($product);
        $repo->delete(2);
       	$this->assertNull($repo->find(2));
    }
}
