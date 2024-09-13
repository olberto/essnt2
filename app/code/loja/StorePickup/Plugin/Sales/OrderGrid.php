<?php

namespace loja\StorePickup\Plugin\Sales;

use Magento\Sales\Ui\Component\DataProvider\Document as OrderGrid;

class OrderGrid
{
    public function afterGetData(OrderGrid $subject, $result)
    {
        foreach ($result as &$order) {
            if ($order['shipping_method'] === 'storepickup') {
                $order['shipping_method'] = 'Retira na Loja';
            }
        }
        return $result;
    }
}
