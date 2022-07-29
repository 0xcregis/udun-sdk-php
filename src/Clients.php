<?php
namespace Udun\Dispatch;
class Clients extends Api
{
	// 获取商户支持的币种信息
	/**
	 * showBalance	Boolean		是否查詢余額，false不獲取，true獲取
	 * */
    public function supportCoins($showBalance = true)
    {
        $body = array(
            'merchantId' => $this->merchant_no,//商户号
            'showBalance' => $showBalance
        );
        return $this->request('/mch/support-coins', $body);
    }


    /**
     * 创建地址
     * mainCoinType 主币种编号
     * walletId 錢包編號,默認根據主錢包生成地址
     * alias 地址別名 
     */
    public function createAddress($mainCoinType,$walletId=null,$alias=null)
    {
        $body = array(
            'merchantId' => $this->merchant_no,
            'mainCoinType' => $mainCoinType,
            'callUrl' => $this->callUrl
        );
        if(!empty($walletId)){
            $body['walletId']=$walletId;
        }
        if(!empty($alias)){
            $body['alias']=$alias;
        }
        return $this->request('/mch/address/create', $body);
    }

    /**
     * 验证地址的合法性
     * mainCoinType 主币种编号
     * address 地址
     * 
     * */
    public function checkAddress($mainCoinType,$address)
    {
        $body = array(
            'merchantId' => $this->merchant_no,//商户号
            'mainCoinType' => $mainCoinType,
            'address' => $address
        );
        return $this->request('/mch/check/address', $body);
    }    


    /**
     * 验证地址是否存在
     * mainCoinType 主币种编号
     * address 地址
     * 
     * */
    public function existAddress($mainCoinType,$address)
    {
        $body = array(
            'merchantId' => $this->merchant_no,//商户号
            'mainCoinType' => $mainCoinType,
            'address' => $address
        );
        return $this->request('/mch/exist/address', $body);
    }  


    /**
     * 申请提币
     * businessId    业务编号,必须唯一
     * mainCoinType  主币种编号
     * coinType      子币种编号
     * address       地址
     * amount        提币数量
     * memo          备注
     * */
    public function withdraw($businessId,$mainCoinType,$coinType,$address,$amount,$memo='')
    {
        $body = array(
            'merchantId' => $this->merchant_no,//商户号
            'mainCoinType' => $mainCoinType,
            'coinType' => $coinType,
            'address' => $address,
            'businessId' => $businessId,
            'amount' => $amount,
            'callUrl' => $this->callUrl  //回调地址
        );
        if(!empty($memo)){
            $body['memo']=$memo;
        }
        return $this->request('/mch/withdraw', $body);
    } 



    //自定义日志
    function printLog($msg) {
        if (!is_dir('log')){
            mkdir('log',0777,true);
        }
        $path="log/".date('Y-m-d').".log";
        file_put_contents($path, "【" . date('Y-m-d H:i:s') . "】" . $msg . "\r\n\r\n", FILE_APPEND);
    }
    //回调函数
    public function callback(){
        $body =  $_POST['body'];
        $nonce = $_POST['nonce'];
        $timestamp = $_POST['timestamp'];
        $sign = $_POST['sign'];
        //接收回调参数 用于日志记录
        //$content = file_get_contents('php://input');
        //$this->printLog("回调接收内容:".$content);
        //验证签名
        $signCheck = $this->signature($body,$timestamp,$nonce);
        if ($sign != $signCheck) {
            throw new UdunDispatchException(-1, '签名错误');
            return ;
        }
        $body = json_decode($body);
        //$this->printLog("回调接收内容(tradeType):".$body->tradeType);
            //$body->tradeType 1充币回调 2提币回调
        if ($body->tradeType == 1) {
                
            //$body->status 0待审核 1审核成功 2审核驳回 3交易成功 4交易失败
            if($body->status == 3){
                //业务处理 
            }
            //无论业务方处理成功与否（success,failed），回调都认为成功
            return "success";

        } elseif ($body->tradeType == 2) {
            
            //$body->status 0待审核 1审核成功 2审核驳回 3交易成功 4交易失败
            if($body->status == 0){
                //业务处理
            }
            else if($body->status == 1){
                //业务处理
            }
            else if($body->status == 2){
                //业务处理 
            }
            else if($body->status == 3){
                //业务处理 
            }
            else if($body->status == 4){
                //业务处理
            }
            //无论业务方处理成功与否（success,failed），回调都认为成功
            return "success";
        }
    }

}
	
