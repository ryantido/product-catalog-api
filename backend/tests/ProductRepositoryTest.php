use PHPUnit\Framework\TestCase;
use Acme\Catalog\Model\Product;
use Acme\Catalog\Repository\ProductRepository;
class ProductRepositoryTest extends TestCase {
  public function testCrud(): void {
    $r = new ProductRepository();
    $p = new Product(1,'A',10);
    $r->save($p); $this->assertSame($p, $r->find(1));
    $r->delete(1); $this->assertNull($r->find(1));
  }
}
