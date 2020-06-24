<?php
namespace Newquest\Quiz\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Newquest\Quiz\Api\GetProductLimitInterface;

class ProductLimit implements GetProductLimitInterface {

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductLimit()
    {
        $productLimit = $this->_scopeConfig->getValue(
            'sales/general/product_limit',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        return $productLimit;
    }
}
