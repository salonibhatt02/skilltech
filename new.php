<?php
// <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>

// <script>
//     const cashfree = Cashfree({
//         mode: "sandbox"
//     });
// </script>

echo '<script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>';
echo '<script>
const cashfree = Cashfree({
    mode: "sandbox"
});
</script>';

\Cashfree\Cashfree::$XClientId = "TEST1012923093d7ea697399f48c341b03292101";
\Cashfree\Cashfree::$XClientSecret = "cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6";
\Cashfree\Cashfree::$XEnvironment = Cashfree\Cashfree::$SANDBOX;

$cashfree = new \Cashfree\Cashfree();

$x_api_version = "2023-08-01";
$create_order_request = new \Cashfree\Model\CreateOrderRequest();
$create_order_request->setOrderAmount(1.00);
$create_order_request->setOrderCurrency("INR");
$create_order_request->setOrderId("order_69340999");

$customer_details = new \Cashfree\Model\CustomerDetails();
$customer_details->setCustomerId("walterwNrcMi");
$customer_details->setCustomerPhone("8474090589");
$create_order_request->setCustomerDetails($customer_details);

$order_meta = new \Cashfree\Model\OrderMeta();
$order_meta->setReturnUrl("https://www.cashfree.com/devstudio/preview/pg/web/checkout?order_id={order_id}");
$create_order_request->setOrderMeta($order_meta);

try {
    $result = $cashfree->PGCreateOrder($x_api_version, $create_order_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PGCreateOrder: ', $e->getMessage(), PHP_EOL;
}
?>