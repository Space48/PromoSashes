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
namespace Space48\PromoSashes\Block;

use Magento\Catalog\Model\Product;
use Amasty\Label\Helper\Data;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Space48\PromoSashes\Model\Sash as Model;


class Sash extends Template
{


    /**
     * @var Model
     */
    private $_sash;

    public function __construct(
        Context $context,
        Data $helper,
        Model $sash,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->setTemplate('Space48_PromoSashes::catalog/product/sash.phtml');
        $this->_sash = $sash;
    }


    public function renderProductSash(Product $product, $string)
    {
        $html = '';
        if ($this->_sash->isApplicable($product)) {
            $html = $this->toHtml();
        }

        return $html;
    }

}

