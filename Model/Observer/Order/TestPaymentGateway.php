<?php

namespace Riskified\ObserverTest\Model\Observer\Order;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class TestPaymentGateway implements ObserverInterface
{
    /**
     * Observer execute
     *
     * @param Observer $observer
     *
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Api\Data\OrderInterface $order */
        $order = $observer->getOrder();

        if (strstr($order->getCustomerEmail(), "+observertest")) {
            $observer->getPaymentData()->transaction_id = 1111;
        }
    }
}
