<?php
require_once __DIR__.'/../vendor/autoload.php';
$merchant_no = 30000; //商户号
$api_key= 'c789324a4XXXXXXX88ec8a3872';// apikey
$gateway_address= 'https://sig11.udun.io'; //节点
$callUrl = "https://localhost/callUrl"; //回调地址
/** @var \udun\Dispatch\UdunDispatch $result */
$result = new \Udun\Dispatch\UdunDispatch([
            'merchant_no' => $merchant_no,
            'api_key' => $api_key,
            'gateway_address'=>$gateway_address,
            'callUrl'=>$callUrl,
            'debug' => true
        ]);

//查询支持的交易对
//var_dump($result->supportCoins(true));
//返回内容  { ["code"]=> int(200) ["data"]=> array(6) { [0]=> array(10) { ["coinType"]=> string(1) "0" ["symbol"]=> string(3) "BTC" ["tokenStatus"]=> int(0) ["mainCoinType"]=> string(1) "0" ["balance"]=> int(0) ["decimals"]=> string(1) "8" ["name"]=> string(3) "BTC" ["logo"]=> string(46) "https://img.udresource.com/public/coin/BTC.png" ["coinName"]=> string(7) "Bitcoin" ["mainSymbol"]=> string(0) "" } [1]=> array(10) { ["coinType"]=> string(2) "31" ["symbol"]=> string(4) "OMNI" ["tokenStatus"]=> int(1) ["mainCoinType"]=> string(1) "0" ["balance"]=> int(0) ["decimals"]=> string(1) "8" ["name"]=> string(9) "USDT-OMNI" ["logo"]=> string(79) "https://img.udresource.com/public/coin/27a1cb00-7905-4975-b485-208639311346.png" ["coinName"]=> string(9) "USDT-OMNI" ["mainSymbol"]=> string(3) "BTC" } [2]=> array(9) { ["coinType"]=> string(3) "195" ["symbol"]=> string(3) "TRX" ["tokenStatus"]=> int(0) ["mainCoinType"]=> string(3) "195" ["balance"]=> int(0) ["decimals"]=> string(1) "6" ["name"]=> string(3) "TRX" ["logo"]=> string(46) "https://img.udresource.com/public/coin/TRX.png" ["coinName"]=> string(4) "TRON" } [3]=> array(10) { ["coinType"]=> string(34) "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t" ["symbol"]=> string(7) "TRCUSDT" ["tokenStatus"]=> int(1) ["mainCoinType"]=> string(3) "195" ["balance"]=> int(0) ["decimals"]=> string(1) "6" ["name"]=> string(10) "USDT-TRC20" ["logo"]=> string(79) "https://img.udresource.com/public/coin/d1dc3cb6-3918-42e0-990d-42383b379237.png" ["coinName"]=> string(10) "USDT-TRC20" ["mainSymbol"]=> string(3) "TRX" } [4]=> array(10) { ["coinType"]=> string(42) "0xdac17f958d2ee523a2206206994597c13d831ec7" ["symbol"]=> string(4) "USDT" ["tokenStatus"]=> int(1) ["mainCoinType"]=> string(2) "60" ["balance"]=> int(0) ["decimals"]=> string(1) "6" ["name"]=> string(10) "USDT-ERC20" ["logo"]=> string(47) "https://img.udresource.com/public/coin/USDT.png" ["coinName"]=> string(4) "USDT" ["mainSymbol"]=> string(3) "ETH" } [5]=> array(10) { ["coinType"]=> string(2) "60" ["symbol"]=> string(3) "ETH" ["tokenStatus"]=> int(0) ["mainCoinType"]=> string(2) "60" ["balance"]=> int(0) ["decimals"]=> string(2) "18" ["name"]=> string(3) "ETH" ["logo"]=> string(46) "https://img.udresource.com/public/coin/ETH.png" ["coinName"]=> string(8) "Ethereum" ["mainSymbol"]=> string(0) "" } } ["message"]=> string(7) "SUCCESS" }

//创建地址
 //var_dump($result->createAddress('195'));
 //返回内容:  { ["code"]=> int(200) ["data"]=> array(2) { ["coinType"]=> int(195) ["address"]=> string(34) "TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF" } ["message"]=> string(7) "SUCCESS" }

//{ ["code"]=> int(200) ["data"]=> array(2) { ["coinType"]=> int(195) ["address"]=> string(34) "TFtLBfPJQBzhthjkjG78WxdcE7kEdJPjer" } ["message"]=> string(7) "SUCCESS" }



//验证地址合法性
//var_dump($result->checkAddress('195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF'));
//返回内容：  { ["code"]=> int(200) ["message"]=> string(7) "SUCCESS" ["data"]=> NULL }
//var_dump($result->existAddress('195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF'));
 //返回内容： { ["code"]=> int(200) ["message"]=> string(7) "SUCCESS" ["data"]=> NULL }

 //申请提币
//var_dump($result->withdraw('sn00001','195','195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF',10));
//返回内容： { ["code"]=> int(200) ["message"]=> string(7) "SUCCESS" }


//回调测试
// var_dump($result->callback());
//返回内容：body=%7B%22address%22%3A%22TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF%22%2C%22amount%22%3A%2210000000%22%2C%22blockHigh%22%3A%22-1%22%2C%22businessId%22%3A%22sn00001%22%2C%22coinType%22%3A%22195%22%2C%22decimals%22%3A%226%22%2C%22fee%22%3A%220%22%2C%22mainCoinType%22%3A%22195%22%2C%22memo%22%3A%22%22%2C%22status%22%3A2%2C%22tradeId%22%3A%22998006370676506624%22%2C%22tradeType%22%3A2%2C%22txId%22%3A%22%22%7D&nonce=eHSrfr&sign=679eeebb2bf221e16fe49fefef635d61&timestamp=1658370940327