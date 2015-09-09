<?php
class Dev
{
    // 获取设备最近上传数据
    public static function devdata_latest($did = '')
    {
        return Gokit_Http::get("app/devdata/{$did}/latest");
    }

    // 获取设备历史数据
    public static function devdata_history($param = [])
    {
        $uri = 'app/devdata2';
        if (isset($param['product_key']) && $param['product_key']) {
            $uri.='?product_key='.$param['product_key'];
        } else {
            return 'product key error';
        }
        if (isset($param['did']) && $param['did']) {
            $uri.='?did='.$param['did'];
        }
        if (isset($param['start_ts']) && $param['start_ts']) {
            $uri.='?start_ts='.$param['start_ts'];
        }
        if (isset($param['end_ts']) && $param['end_ts']) {
            $uri.='?end_ts='.$param['end_ts'];
        }
        if (isset($param['name']) && $param['name']) {
            $uri.='?name='.$param['name'];
        }
        if (isset($param['limit']) && $param['limit']) {
            $uri.='?limit='.$param['limit'];
        }
        if (isset($param['skip']) && $param['skip']) {
            $uri.='?skip='.$param['skip'];
        }
        // http://api.gizwits.com/app/devdata2?product_key=pk&did=gdGn7PzAYf4VrhnVag5x8D&start_ts=1349032093&end_ts=1349032093&name=temp&limit=20&skip=0
        return Gokit_Http::get($uri);
    }

    // 获取设备信息
    public static function info($did = '')
    {
        if (!$did) {
            return 'did is null';
        }
        return Gokit_Http::get("app/devices/{$did}");
    }

    // 绑定关系
    public static function bindings($limit = 10, $skip = 0)
    {
        return Gokit_Http::get("app/bindings?show_disabled=1&limit={$limit}&skip={$skip}");
    }

    // 绑定设备@TODO 绑定多个设备需要进行修改
    public static function bind($did = '', $passcode = 'gokit', $remark = '') 
    {
        return Gokit_Http::post("app/bindings", ['devices' => [[
                   'did'      => $did,
                   'passcode' => $passcode,
                   'remark'   => $remark,
               ]]]);
    }

    public static function unbind($did = '')
    {
        return Gokit_Http::delete("app/bindings", ['devices' => [[
            'did'      => $did
        ]]]);
    }

    public static function select($product_key, $mac)
    {
        return Gokit_Http::get("app/devices?product_key={$product_key}&mac={$mac}");
    }
}
?>