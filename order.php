<?php

require __DIR__ . '/vendor/autoload.php';

class Order
{
    public function DoOrder()
    {
        $order_match_client = new \Api\OrderClient("172.22.0.4:8088", [
            'credentials' => \Grpc\ChannelCredentials::createInsecure()
        ]);

        //请求体
        $order_request = new \Api\OrderRequest();
        $order_request->setUuid(11);
        $order_request->setOid(5);
        $order_request->setSymbol('eth2usdt');
        $order_request->setTransaction(1);
        $order_request->setPrice(0.3);
        $order_request->setVolume(0.01);

        $request = $order_match_client->DoOrder($order_request)->wait();

        list($response, $status) = $request;

        $msg = $response->getMessage();
        $code = $response->getCode();
        print($msg);
        echo PHP_EOL;
        print($code);
    }
}

$order = new Order();
$order->DoOrder();
