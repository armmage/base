<?php
/**
 * @package Base
 *
 * @author Gevorg Arshakyan <gevorg@armmage.com>
 *
 * @copyright Copyright (c) 2023 ArmMage (https://armmage.com)
 */

declare(strict_types = 1);

namespace ArmMage\Base\Model\Order\Email\Sender;

use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Email\Sender\OrderSender as BaseOrderSender;
use Magento\Sales\Model\Order\Payment;

class OrderSender extends BaseOrderSender
{
    /**
     * @inheritDoc
     */
    public function send(
        Order $order,
        $forceSyncMode = false
    ): bool {
        /** @var Payment $payment */
        $payment = $order->getPayment();
        $paymentMethodInstance = $payment->getMethodInstance();
        $code = $paymentMethodInstance->getCode();

        if (
            in_array($code, ['ameriapay', 'idrampay'])
            && !$order->hasData('send_email')
        ) {
            return false;
        }

        return parent::send($order, $forceSyncMode);
    }
}
