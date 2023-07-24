# 碳丝路低碳数据开放平台PHP SDK

## 1. 安装
```composer log
composer install tansilu/tslopensdk
```

## 2. 配置
  申请应用APPID ，并设置应用私钥和公钥。
  
## 3. 初始化客户端
```php
$apiClient = new \com\tsl3060\open\sdk\ApiClient();

$conf = new \com\tsl3060\open\sdk\Config();
//应用APPID
$conf->setAppId("");
//应用私钥
$conf->setPrivateKey("");
//应用公钥
$conf->setPublicKey("");
//API 平台公钥
$conf->setApiPublicKey("");

$apiClient->setConfig($conf);

//设置通知数据监听
$apiClient->setNotifyListener();
```

## 4. 通知接收
   使用通知接收，需自行实现应用回调接口；在回调接口中将接收到数据传入 $apiClient->notifyRun() 即可
```php
$header = getallheaders();
$raw = file_get_contents("php://input");

try {
    $no = $apiClient->notifyRun($header['Content-Type'], $raw);
    header("Content-Type: application/json");
    echo json_encode($no);
} catch (\com\tsl3060\open\sdk\exception\BadResourceException|\com\tsl3060\open\sdk\exception\UnknownResourceException $e) {
    //输出异常
    header('HTTP/1.1 500 Internal Server Error');
}
```
    