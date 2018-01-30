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
declare(strict_types=1);

namespace Space48\PromoSashes\Plugin\Catalog\Product;

use Magento\Catalog\Block\Product\Image;
use Space48\PromoSashes\Block\Sash as Block;

class Sash
{
    /**
     * @var Block
     */
    private $_block;

    /**
     * Sash constructor.
     *
     * @param Block $block
     */
    public function __construct(
        Block $block
    )
    {
        $this->_block = $block;
    }

    /**
     * @param Image $subject
     * @param       $result
     *
     * @return string
     */
    public function afterToHtml(Image $subject, $result)
    {
        $product = $subject->getProduct();

        if ($product) {
            $result .= $this->_block->renderProductSash($product, 'product');
        }
        return $result;
    }
}
