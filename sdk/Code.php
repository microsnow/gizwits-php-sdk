<?php
	class Code 
	{
		public static function send($phone = '')
		{
            $r = Gokit_Http::post('app/codes', [
            	'phone' => $phone
            ]);
            return $r;
        }
	}
?>