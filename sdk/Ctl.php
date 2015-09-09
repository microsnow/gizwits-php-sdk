<?php
class Ctl
{
	// 设置数据点
    public static function post($did = '', $param = []) 
    {
        if (!$did) {
            return 'did error';
        }
        // return Gokit_Http::post("api.php", $param);
        return Gokit_Http::post("app/control/{$did}", $param);
    }
}
?>