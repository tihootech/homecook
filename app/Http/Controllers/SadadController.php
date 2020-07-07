<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SadadController extends Controller
{
    //Create sign data(Tripledes(ECB,PKCS7))
    private static function encrypt_pkcs7($str, $key) {
        $key = base64_decode($key);
        $ciphertext = OpenSSL_encrypt($str,"DES-EDE3", $key, OPENSSL_RAW_DATA);
        return base64_encode($ciphertext);
    }

    //Send Data
    private static function CallAPI($url, $data = false) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    public function test()
    {
        $key="hy9C6swnSA3JiJXwlxKOOZA/gw8hauah";
        $MerchantId="140333809";
        $TerminalId="24089363";
        $Amount=10000; //Rials
        $OrderId=123;
        $LocalDateTime=date("m/d/Y g:i:s a");
        $ReturnUrl="https://koofterizeh.com";
        $SignData=self::encrypt_pkcs7("$TerminalId;$OrderId;$Amount","$key");
        $data = array('TerminalId'=>$TerminalId,
        'MerchantId'=>$MerchantId,
        'Amount'=>$Amount,
        'SignData'=> $SignData,
        'ReturnUrl'=>$ReturnUrl,
        'LocalDateTime'=>$LocalDateTime,
        'OrderId'=>$OrderId);
        $str_data = json_encode($data);
        $res=self::CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Request/PaymentRequest',$str_data);
        $arrres=json_decode($res);
        if($arrres->ResCode==0)
        {
            $Token= $arrres->Token;
            $url="https://sadad.shaparak.ir/VPG/Purchase?Token=$Token";
            header("Location:$url");
        }
        else {
            die($arrres->Description);
        }
    }

    public function verify()
    {
        $key="hy9C6swnSA3JiJXwlxKOOZA/gw8hauah";
        $OrderId=$_POST["OrderId"];
        $Token=$_POST["token"];
        $ResCode=$_POST["ResCode"];
        if($ResCode==0)
        {
        	$verifyData = array('Token'=>$Token,'SignData'=>self::encrypt_pkcs7($Token,$key));
        	$str_data = json_encode($verifyData);
        	$res=self::CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Advice/Verify',$str_data);
        	$arrres=json_decode($res);
        }
        if($arrres->ResCode!=-1 && $arrres->ResCode==0)
        {
        	//Save $arrres->RetrivalRefNo,$arrres->SystemTraceNo,$arrres->OrderId to DataBase
        	echo "شماره سفارش:".$OrderId."<br>"."شماره پیگیری : ".$arrres->SystemTraceNo."<br>"."شماره مرجع:".
        	$arrres->RetrivalRefNo."<br> اطلاعات بالا را جهت پیگیری های بعدی یادداشت نمایید."."<br>";
        }
        else
        	echo "تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
    }
}
