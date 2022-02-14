# omnipay-php

### Prerequisites
- A minimum of PHP 5.3 is required


## Installation

-   If your project using composer, run the below command

```
composer require omni-psp/omni-pay
```

- If you are not using composer, download the latest release from [the releases section](https://github.com/dharmwdp/omnipay-php/releases).
    **You should download the `omnipay-php.zip` file**.
    After that, include `Omnipay.php` in your application and you can use the API as usual.
    
##Note:
This PHP library follows the following practices:

- Namespaced under `Omnipay\Api`
- API throws exceptions instead of returning errors
- Options are passed as an array instead of multiple arguments wherever possible
- All requests and responses are communicated over JSON

## Basic Usage

Instantiate the omnipay php instance with `user_name ` , `password` & secret_key(These will be different for Test and Live). You can obtain the keys from the dashboard app ([https://psp.digitalworld.com.sa/user-api-keys](https://psp.digitalworld.com.sa/user-api-keys))

```php
use Omnipay\Api\Api;

$secret_key = '89eb5f3beb06a663a81c0c5a392fdb97';
$api_user_name = 'psp_test.paasy3u5.cGFhc3kzdTU2NGViZA==';
$api_password = 'OVNHR3dHaDd5ZnpGN0ExcnByUmdPQVprNzliZUhMbmR3bVJCSUp3alFyUT0=';
$apiMode = 0; // 0=Test, 1=Live
$api = new Api($api_user_name, $api_password, $apiMode); 
```

The resources can be accessed via the `$api` object. All the methods invocations follows the following pattern

```php
    //$api->class->function() to access the API
    //Example
    //This is for encrypt decrypt before call API
    //Create Payment
    $paymentParm = array('customer' =>array('name'=>'Dharmraj Kumhar', 'email'=>'dharmraj.kumhar@example.com') ,'order'=>array('amount'=>'1', 'currency' => 'SAR'),'sourceOfFunds' => array('provided'=>array('card'=>array('number'=>'5123450000000008','expiry'=>array('month'=>'12','year'=>'2023'), 'cvv'=>'999')), 'cardType' => 'C'), 'remark'=>array('description'=>'This payment is done by card'));
    $api->encryptdecrypt->create($paymentParm, $secret_key, 'encrypt');
    // Payment API
    //Alwase send $param['trandata'] in encrypted string
    $result = $api->payment->createPayment($param);
    
    //Refund Transaction
    $refundParm = array('transaction' =>array('id'=>'nt8my581z620365207292e','amount'=>'1', 'currency' => 'SAR'), 'remark'=>array('description'=>'Refund transaction'));
    $encripted_result = $api->encryptdecrypt->create($refundParm, $secret_key, 'encrypt');
    $param['trandata'] = $encripted_result['content']['apiResponse'];
    $result = $api->payment->refund($param);
    
    //Retrive Transaction
    $result = $api->payment->retriveTransaction($transactionId);
    
    //Transaction List between two date range
    $AllTransParm = array('transaction' =>array('startdate'=>'2022-01-15','enddate'=>'2022-02-09'));
    $result = $api->payment->transactionList($AllTransParm);
```

## License

The Omnipay PHP SDK is released under the MIT License. See [LICENSE](LICENSE) file for more details.
