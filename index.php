<?php

///////////////////////////////////////////////////////////////
// 
// 首先感谢机智云提供平台
// 
// 机智云PHP端SDK,使用说明：
// 1. 修改$appid，$username，$password，$product_key变量
// 2. 取消User::create行注释，创建用户 User::create，获取结果修改$token变量，然后就可以注释掉
// 3. 如果有用户，可以先把token变量置为空串，然后登录获取token
// 4. Dev::select 查询设备信息，修改$did,passcode
// 5. Dev::bind 绑定设备
// 6. Dev::info 查询设备信息
// 7. Ctl::post 发送命令
// 
// ////////////////////////////////////////////////////////////

$appid = 'fe2fceb0a9284706ba858fb2c39f50ba';
$did   = 'iotUUL3fEuZGXQTATLxi4t';
$token = 'da100813cee4470382f7738648937b8d';
$uuid = '1e61ac3d74104706b9eb65f4d7bec30f';
$product_key = '3cb6c47f1fbb467d9db789660ffb3660';
$mac = 'VIRTUAL:SITE';
$passcode = '123456';

$username = 'USERNAME';
$password = 'PASSWORD';

require_once './sdk/Http.class.php';


define('ROOT_PATH', dirname(__FILE__));


function __autoload($class = '')
{
	$class_file = ROOT_PATH."/sdk/{$class}.php";
	if (file_exists($class_file)) {
		require_once $class_file;
	} else {
		echo $class_file.' not exists';
	}
}



// $r = User::create(['username' => 'weixue108', 'password' => $password]);var_dump($r);exit;
if (!$token) {
	$r = User::login($username, $password);var_dump($r);exit;
}
// $r = User::create_anonymous($phone_id);var_dump($r);exit;
// $r = User::create(['username' => 'weixue108', 'password' => $password]);
// $r = User::create(['email' => 'weixue108@126.com', 'password' => $password]);
// $r = Dev::select($product_key, $mac);var_dump($r);exit; // ok
// $r = Dev::devdata_latest($did);var_dump($r);exit;
// $r = Dev::bind($did, $passcode); var_dump($r);exit;
// $r = Dev::info($did); var_dump($r);exit;
// $r = Dev::bindings();  var_dump($r);exit;
// $r = Dev::unbind($did);
// $r = Dev::devdata_history(['product_key' => $product_key]);
// $r = Ctl::post($did, [
// 	'attr' => 'LED_OnOff',
// 	'val' => true
// ]);
var_dump($r);exit;
