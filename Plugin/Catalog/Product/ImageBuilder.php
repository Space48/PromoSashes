<?php
/**
 * Space48_PromoSashes
 *
 * @category    Space48
 * @package     Space48_PromoSashes
 * @Date        03/2017
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @author      @diazwatson
 */

declare(strict_types = 1);
namespace Space48\PromoSashes\Plugin\Catalog\Product;

use Closure;
use Magento\Catalog\Block\Product\ImageBuilder as CoreImageBuilder;
use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;

class ImageBuilder
{

    public function __construct(
        Registry $registry
    )
    {
        $this->registry = $registry;
    }

    /**
     * @param CoreImageBuilder $subject
     * @param                  $result
     *
     * @return mixed
     */
    public function afterCreate(CoreImageBuilder $subject, $result)
    {
        $result->setProduct($this->registry->registry('promosashes_current_product'));

        return $result;
    }

    /**
     * @param CoreImageBuilder $subject
     * @param Closure          $proceed
     * @param Product          $product
     *
     * @return CoreImageBuilder
     */
    public function aroundSetProduct(CoreImageBuilder $subject, Closure $proceed, Product $product)
    {
        $result = $proceed($product);
        $this->registry->unregister('promosashes_current_product');
        $this->registry->register('promosashes_current_product', $product);

        return $result;
    }
}
