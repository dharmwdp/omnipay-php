<?php

namespace Omnipay\Api;

class EncryptDecrypt
{
    public function create($attributes = array(), $secret_key = '', $action = 'decrypt')
    {
        $string = json_encode($attributes);
        //pr($secret_key);die;
        $encrypt_method = "AES-256-CBC";
        $secret_iv = 'AGNNMLDKYPKEZDNK'; // user define secret key
        $output = '';
        try{
            if ($action == 'encrypt') {
                $output = openssl_encrypt($string, $encrypt_method, $secret_key, OPENSSL_RAW_DATA, $secret_iv);
                $output = bin2hex($output);
                $code = 200;            
                $content =  ['status'=>$code,  "httpStatus"=> $code,"codeDescription"=> __("Success"),  'apiResponse'=>$output];
                $result = ['content' => $content, 'code' => $code];
            } else if ($action == 'decrypt' && ctype_xdigit($string)) {
                $output = openssl_decrypt(hex2bin($string), $encrypt_method, $secret_key, OPENSSL_RAW_DATA, $secret_iv);
                $code = 200;            
                $content =  ['status'=>$code,  "httpStatus"=> $code,"codeDescription"=> __("Success"),  'apiResponse'=>$output];
                $result = ['content' => $content, 'code' => $code];
            } else{
                $code = 401;
                $msg = __('Invalid parameters');        
                $content =  ['status'=>$code,"httpStatus"=> $code,"codeDescription"=> __("Failed"), "message"=>  __($msg)];
                $result = ['content' => $content, 'code' => $code];
            }
        } catch(Exception $e){
            $output = $e->getMessage();
        }
        if(empty($output)){
            $code = 402;
            $msg = __('Invalid param string');      
            $content =  ['status'=>$code,"httpStatus"=> $code,"codeDescription"=> __("Failed"), "message"=>  __($msg)];
            $result = ['content' => $content, 'code' => $code];
        }
        return $result;
    }
}