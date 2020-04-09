<?php

include_once('Config.php');
include_once('Tool.php');

class Clients
{

    // 获取商户支持的币种信息
    public function supportCoins($showBalance = true)
    {
        $body = array(
            'merchantId' => CLIENTCONFIG['merchant_number'],
            'showBalance' => $showBalance
        );

        $body = json_encode($body);
        $timestamp = time();
        $nonce = rand(100000, 999999);

        $url = CLIENTCONFIG['gateway_address'].'/mch/support-coins';
        $key = CLIENTCONFIG['api_key'];

        $sign = md5($body.$key.$nonce.$timestamp);
        
        $data = array(
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );

        $data_string = json_encode($data);

        return http_post($url, $data_string);
    }

    // 生成地址
    public function createAddress($coinType, $callUrl)
    {
        $body = array(
            'merchantId' => CLIENTCONFIG['merchant_number'],
            'coinType' => $coinType,
            'callUrl' => $callUrl,
        );

        $body = '['.json_encode($body).']';
        $timestamp = time();
        $nonce = rand(100000, 999999);

        $url = CLIENTCONFIG['gateway_address'].'/mch/address/create';
        $key = CLIENTCONFIG['api_key'];

        $sign = md5($body.$key.$nonce.$timestamp);
        
        $data = array(
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );

        $data_string = json_encode($data);

        return http_post($url, $data_string);
    }

    // 校验地址合法性
    public function checkAddress($mainCoinType, $address)
    {
        $body = array(
            'merchantId' => CLIENTCONFIG['merchant_number'],
            'mainCoinType' => $mainCoinType,
            'address' => $address,
        );

        $body = '['.json_encode($body).']';
        $timestamp = time();
        $nonce = rand(100000, 999999);

        $url = CLIENTCONFIG['gateway_address'].'/mch/check/address';
        $key = CLIENTCONFIG['api_key'];

        $sign = md5($body.$key.$nonce.$timestamp);
        
        $data = array(
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );

        $data_string = json_encode($data);

        return http_post($url, $data_string);
    }

    // 发送提币申请
    public function withdraw($mainCoinType, $coinType, $amount, $address, $callUrl, $businessId, $memo)
    {
        $body = array(
            'merchantId' => CLIENTCONFIG['merchant_number'],
            'mainCoinType' => $mainCoinType,
            'address' => $address,
            'amount' => $amount,
            'coinType' => $coinType,
            'callUrl' => $callUrl,
            'businessId' => $businessId,
            'memo' => $memo
        );

        $body = '['.json_encode($body).']';
        $timestamp = time();
        $nonce = rand(100000, 999999);

        $url = CLIENTCONFIG['gateway_address'].'/mch/withdraw';
        $key = CLIENTCONFIG['api_key'];

        $sign = md5($body.$key.$nonce.$timestamp);
        
        $data = array(
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );

        $data_string = json_encode($data);

        return http_post($url, $data_string);
    }

    // 代付
    public function proxypay($mainCoinType, $coinType, $amount, $address, $callUrl, $businessId, $memo)
    {
        $body = array(
            'merchantId' => CLIENTCONFIG['merchant_number'],
            'mainCoinType' => $mainCoinType,
            'address' => $address,
            'amount' => $amount,
            'coinType' => $coinType,
            'callUrl' => $callUrl,
            'businessId' => $businessId,
            'memo' => $memo
        );

        $body = '['.json_encode($body).']';
        $timestamp = time();
        $nonce = rand(100000, 999999);

        $url = CLIENTCONFIG['gateway_address'].'/mch/withdraw/proxypay';
        $key = CLIENTCONFIG['api_key'];

        $sign = md5($body.$key.$nonce.$timestamp);
        
        $data = array(
            'timestamp' => $timestamp,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );

        $data_string = json_encode($data);

        return http_post($url, $data_string);
    }

}
