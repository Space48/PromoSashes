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

namespace Space48\PromoSashes\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Space48\PromoSashes\Helper\Data;

class Sash extends AbstractModel
{

    /**
     * @var TimezoneInterface
     */
    protected $_localeDate;

    /**
     * @var Data
     */
    protected $_helper;

    /**
     * Sash constructor.
     *
     * @param Context           $context
     * @param Registry          $registry
     * @param TimezoneInterface $dateTime
     * @param Data              $helper
     */
    public function __construct(
        Context $context,
        Registry $registry,
        TimezoneInterface $dateTime,
        Data $helper
    )
    {
        parent::__construct($context, $registry);
        $this->_localeDate = $dateTime;
        $this->_helper = $helper;
    }

    /**
     * @param $product
     *
     * @return bool
     */
    public function isApplicable($product)
    {
        $todayEndOfDayDate = $this->_localeDate->date()->setTime(
            23,
            59,
            59
        )
            ->format('Y-m-d H:i:s');
        $todayStartOfDayDate = $this->_localeDate->date()->setTime(
            0,
            0
        )->format('Y-m-d H:i:s');

        $isApplicable = false;

//        $now = $this->_localeDate->date()->format('Y-m-d H:i:s');

        /** Todo: find a better way to manage time */

        if ($this->_helper->isEnabled()) {

            /** @var \Magento\Catalog\Model\Product $product */
            if (null !== $product->getData('news_from_date')) {
                if ($product->getData('news_from_date') <= $todayStartOfDayDate) {
                    if (null !== $product->getData('news_to_date')) {
                        if ($product->getData('news_to_date') >= $todayEndOfDayDate) {
                            $isApplicable = true;
                        }
                    }
                }
            }
        }
        return $isApplicable;
    }
}
