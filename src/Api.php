<?php
namespace Udun\Dispatch;
use Hanson\Foundation\AbstractAPI;
class Api extends AbstractAPI
{
    //商户号
    protected $merchant_no;   
    //apikey      
    protected $api_key;  
    //节点地址           
    protected $gateway_address;
    //回调地址     
    protected $callUrl;             
    public function __construct( $merchant_no, string $api_key,string $gateway_address, string $callUrl)
    {
        $this->merchant_no = $merchant_no;
        $this->api_key = $api_key;
        $this->gateway_address = $gateway_address;
        $this->callUrl = $callUrl;
    }

 
    /**
     * @param string $method  
     * @param array $params
     * @return result
     * @throws UdunDispatchException
     */
    public function request(string $method, array $body)
    {
    	$time = time();
    	$nonce = rand(100000, 999999);
        if($method=='/mch/support-coins'){
            $body = json_encode($body);
        }else{
            $body = '['.json_encode($body).']';
        }
        
        $sign = $this->signature($body,$time,$nonce);
        $params = array(
        	'timestamp' => $time,
            'nonce' => $nonce,
            'sign' => $sign,
            'body' => $body
        );
        $http = $this->getHttp();
        $response = $http->json($this->gateway_address. $method, $params);
        $result = json_decode(strval($response->getBody()), true);
        $this->checkErrorAndThrow($result);
        return $result;
    }

    public function signature($body,$time,$nonce)
    {
        return md5($body.$this->api_key.$nonce.$time);
    }

    /**
     * @param $result
     * @throws UdunDispatchException
     */
    private function checkErrorAndThrow($result)
    {
        if (!$result || $result['code'] != 200) {
            throw new UdunDispatchException($result['code'], $result['message']);
        }
    }
}

?>