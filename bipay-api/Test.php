<?php

//调用示例

include_once('Clients.php');

$client = new Clients();

// 获取商户支持的币种信息
//$res = $client->supportCoins(true);

// 生成地址
//$res = $client->createAddress(520, 'http://localhost:8080/callback');

// 校验地址合法性
//$res = $client->checkAddress(520, '0x5a8c6b8f12d39978fbfd96b1b10b68f60430eb10');

//发送提币申请
//$res = $client->withdraw(520, 520, 2, '0x5a8c6b8f12d39978fbfd96b1b10b68f60430eb10', 'http://localhost:8080/callback', time(), '测试备注信息');

//代付
//$res = $client->proxypay(520, 520, 2, '0x5a8c6b8f12d39978fbfd96b1b10b68f60430eb10', 'http://localhost:8080/callback', time(), '测试备注信息');

echo '<pre>';
print_r(json_decode($res));
echo '</pre>';