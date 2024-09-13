<?php

namespace loja\StorePickup\Model;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;

class Carrier extends AbstractCarrier implements CarrierInterface
{
    protected $_code = 'storepickup';

    public function collectRates(RateRequest $request)
    {
        $result = $this->_rateResultFactory->create();
        $method = $this->_rateMethodFactory->create();

        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('name'));

        $method->setPrice(0);  // Sem custo de envio
        $method->setCost(0);

        $result->append($method);
        return $result;
    }

    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
}
