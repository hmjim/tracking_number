<?php


namespace Class\AbstractOrder;

use \Class\AbstractOrder\AbstractOrder;

class Order extends AbstractOrder
{

    protected function loadOrderData(int $id): array
    {
        require_once(__DIR__ . '/vendor/autoload.php');

        // See README for more information on the Configuration object's options
        $config = new SellingPartnerApi\Configuration([
            "lwaClientId" => "<LWA client ID>",
            "lwaClientSecret" => "<LWA client secret>",
            "lwaRefreshToken" => "<LWA refresh token>",
            "awsAccessKeyId" => "<AWS access key ID>",
            "awsSecretAccessKey" => "<AWS secret access key>",
            "endpoint" => SellingPartnerApi\Endpoint::NA  // or another endpoint from lib/Endpoints.php
        ]);

        $apiInstance = new SellingPartnerApi\Api\OrdersV0Api($config);
        $order_id = $id; // string | An Amazon-defined order identifier, in 3-7-7 format.
        $data_elements = array('tracking_number'); // string[] | An array of restricted order data elements to retrieve (valid array elements are \"buyerInfo\" and \"shippingAddress\")

        try {
            return $apiInstance->getOrder($order_id, $data_elements);
        } catch (Exception $e) {
            echo 'Exception when calling OrdersV0Api->getOrder: ', $e->getMessage(), PHP_EOL;
        }


    }
}
