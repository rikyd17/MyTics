<?php
use Midtrans\Config;
use Midtrans\Snap;

class DanaService {
  public static function createInvoice($orderId, $amount) {
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = false;

    $params = [
      'payment_type' => 'qris',
      'transaction_details' => [
        'order_id' => $orderId,
        'gross_amount' => $amount,
      ],
      'qris' => [
        'acquirer' => 'dana'
      ]
    ];

    return Snap::createTransaction($params);
  }
}