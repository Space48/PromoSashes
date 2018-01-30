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

namespace Space48\PromoSashes\Plugin\Catalog\Product\View;

use Magento\Catalog\Block\Product\View\Gallery;
use Space48\PromoSashes\Block\Sash as Block;
use Space48\PromoSashes\Helper\Data;

class Sash
{
    /**
     * @var Data
     */
    protected $_helper;
    /**
     * @var Block
     */
    private $_block;

    public function __construct(
        Data $helper,
        Block $block
    )
    {
        $this->_helper = $helper;
        $this->_block = $block;
    }

    /**
     * @param Gallery $subject
     * @param         $result
     *
     * @return string
     */
    public function afterToHtml(Gallery $subject, $result)
    {
        $product = $subject->getProduct();
        $name = $subject->getNameInLayout();
        if ($product && $name === "product.info.media.image") {
            $result .= $this->_block->renderProductSash($product, 'product');
        }

        return $result;
    }
}
