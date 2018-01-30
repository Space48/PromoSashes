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

namespace Space48\PromoSashes\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Stdlib\DateTime\DateTime;

class Data extends AbstractHelper
{

    /**
     * @var DateTime
     */
    protected $_date;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * Data constructor.
     * @param Context  $context
     * @param DateTime $date
     */
    public function __construct(
        Context $context,
        DateTime $date
    )
    {
        $this->_date = $date;
        $this->_scopeConfig = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool) $this->_getConfig('general/enabled');
    }

    /**
     * @param $path
     *
     * @return \Magento\Framework\App\Config
     */
    protected function _getConfig($path)
    {
        return $this->_scopeConfig->getValue('space48_promosashes/' . $path);
    }
}
