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

Instantiate the razorpay php instance with `key_id` & `key_secret`. You can obtain the keys from the dashboard app ([https://psp.digitalworld.com.sa/user-api-keys](https://psp.digitalworld.com.sa/user-api-keys))

```php
use Omnipay\Api\Api;

$api = new Api($api_key, $api_secret);
```

The resources can be accessed via the `$api` object. All the methods invocations follows the following pattern

```php
    // $api->class->function() to access the API
    //Example
    // This is for encrypt decrypt before call any API
    $api->encryptdecrypt->create($paymentParm, $secret_key, 'encrypt');
    // Payment API
    //Alwase send $param['trandata'] in encrypted string
    $result = $api->payment->createPayment($param);
```

## License

The Omnipay PHP SDK is released under the MIT License. See [LICENSE](LICENSE) file for more details.
