<?php
	class Gokit_Http
	{
		public static $ch = null;
		public static $url_prefix = 'http://api.gizwits.com/';
		// public static $url_prefix = 'http://gokit_test.com/';

		public static $appid = '';
		public static $token = '';

		public static $headerArr = [];

		// 初始化curl
		public static function init()
		{
			if (!self::$ch) {
				self::$ch = curl_init();
			}
			global $appid,$token;
			self::$headerArr[] = 'Content-Type: application/json';
			if ($appid) {
				self::$headerArr[] = "X-Gizwits-Application-Id: ".$appid;
			}
			if ($token) {
				self::$headerArr[] = "X-Gizwits-User-token: ".$token;
			}
		}

		// post 请求
		public static function post($uri, $data)
		{
			self::init();
			// 传输的json数据
			$data = json_encode($data);
			// curl 设置
			curl_setopt(self::$ch, CURLOPT_URL, self::$url_prefix.$uri );
			curl_setopt(self::$ch, CURLOPT_POST, 1 );
			curl_setopt(self::$ch, CURLOPT_HEADER, 0 );
			curl_setopt(self::$ch, CURLOPT_HTTPHEADER , self::$headerArr );  //构造IP
			curl_setopt(self::$ch, CURLOPT_BINARYTRANSFER, true); 
			curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $data);
			$r = curl_exec(self::$ch);
			curl_close(self::$ch);
			self::$ch = null;
			// 处理结果
			return self::response($r);
		}

		// get 请求
		public static function get($uri)
		{
			self::init();
			// curl 设置
			curl_setopt(self::$ch, CURLOPT_URL, self::$url_prefix.$uri );
			curl_setopt(self::$ch, CURLOPT_HTTPHEADER , self::$headerArr );
			curl_setopt(self::$ch, CURLOPT_BINARYTRANSFER, true); 
			curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt(self::$ch, CURLOPT_HEADER, 0 );
			$r = curl_exec ( self::$ch );
			curl_close ( self::$ch );
			self::$ch = null;
			// 处理结果
			return self::response($r);
		}

		// get 请求
		public static function delete($uri, $data = [])
		{
			self::init();
			// curl 设置
			curl_setopt(self::$ch, CURLOPT_URL, self::$url_prefix.$uri );
			$data = json_encode($data);
			curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt(self::$ch, CURLOPT_HTTPHEADER , self::$headerArr );
			curl_setopt(self::$ch, CURLOPT_BINARYTRANSFER, true); 
			curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt(self::$ch, CURLOPT_HEADER, 0 );
			curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
			$r = curl_exec ( self::$ch );
			curl_close ( self::$ch );
			self::$ch = null;
			// 处理结果
			return self::response($r);
		}

		// 处理输出
		public static function response($r)
		{
			if ($r) {
				$r = json_decode($r, true);
				if ($r) {
					return $r;
				}
			}
			return '请求失败：'.var_export($r, true);
		}
	}
?>