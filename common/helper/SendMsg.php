<?php
namespace common\helper;
use yii\web\Session;

/**
 * 发送短信接口类
 * 短信服务商：互亿无线http://sms.ihuyi.com
 */
class SendMsg
{
    private static $account = 'C99568191'; //APIID
    private static $password = ''; //APIKEY
    private static $url = "http://106.ihuyi.cn/webservice/sms.php?method=Submit"; //接口地址
    private static $get = [];

    //发送短信
    public static function send($mobile)
    {
        if(empty($mobile)) return false;

        self::$get = [];

        //生成随机数验证码
        $mobile_code = self::random(6,1);

        self::$get['account'] = self::$account;
        self::$get['password'] = self::$password;
        self::$get['mobile'] = $mobile;
        self::$get['content'] = rawurlencode("【伏羲教育】您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");

        /*$session = new Session();
        $session->set('mobile',$mobile);
        $session->set('mobile_code',$mobile_code);
        return true;*/

        $gets =  self::xml_to_array(self::post(http_build_query(self::$get),self::$url));

        if($gets['SubmitResult']['code']==2){
            $session = new Session();
            $session->set('mobile',$mobile);
            $session->set('mobile_code',$mobile_code);
            return true;
        }else{
            return false;
        }
    }

    //请求数据到短信接口，检查环境是否 开启 curl init。
    private static function Post($curlPost,$url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }

    //将 xml数据转换为数组格式。
    private static function xml_to_array($xml){
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches)){
            $count = count($matches[0]);
            for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                if(preg_match( $reg, $subxml )){
                    $arr[$key] = self::xml_to_array( $subxml );
                }else{
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }

    //random() 函数返回随机整数。
    private static function random($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }

}