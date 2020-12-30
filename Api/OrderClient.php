<?php

namespace Api;

class OrderClient extends \Grpc\BaseStub
{
    /**
     * 构造函数必须有.
     */
    public function __construct($hostname, array $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    public function DoOrder(\Api\OrderRequest $argument, $metadata = [], $options = [])
    {
        //简单模式
        return $this->_simpleRequest(
            //这里找到golang那边生成的.pd.go文件里面的FullMethod的值原模原样填写过来即可！
            '/api.Order/DoOrder',
            //传入的请求体
            $argument,
            ['\Api\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }
}
