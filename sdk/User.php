<?php
///////////////////////////////////////////////////////////////////////////////////
//     开源程序
///////////////////////////////////////////////////////////////////////////////////

class User 
{
    private $username = '';
    private $password = '';

	public static function login($username = '', $password = '')
	{
        $r = Gokit_Http::post('app/login', [
        	'username' => $username,
            'password' => $password,
        ]);

        return $r;
	}

    // 创建匿名
    public static function create_anonymous($phone_id = '')
    {
        $r = Gokit_Http::post('app/users', [
            'phone_id' => $phone_id,
        ]);

        return $r;
    }

    // 创建用户
    public static function create($param = [])
    {
        $username = $password = $email = $code = $phone = '';

        // username and password
        if (isset($param['username']) && $param['username']) {
            $username = $param['username'];
        }
        
        if (isset($param['password']) && $param['password']) {
            $password = $param['password'];
        }
        if ($username && $password) {
            $r = Gokit_Http::post('app/users', [
                    'username' => $username,
                    'password' => $password,
                ]);
            return $r;
        }
        // email and password
        if (isset($param['email']) && $param['email']) {
            $email = $param['email'];
        }
        if (isset($param['password']) && $param['password']) {
            $password = $param['password'];
        }
        if ($email && $password) {
            $r = Gokit_Http::post('app/users', [
                    'email'    => $email,
                    'password' => $password,
                ]);
            return $r;
        }
        // phone password code
        if (isset($param['phone']) && $param['phone']) {
            $phone = $param['phone'];
        }
        if (isset($param['password']) && $param['password']) {
            $password = $param['password'];
        }
        if (isset($param['code']) && $param['code']) {
            $code = $param['code'];
        }
        if ($phone && $password && $code) {
            $r = Gokit_Http::post('app/users', [
                    'phone'    => $phone,
                    'password' => $password,
                    'code'     => $code
                ]);
            return $r;
        }
        // src uid token 
        if (isset($param['src']) && $param['src']) {
            $src = $param['src'];
        }
        if (isset($param['uid']) && $param['uid']) {
            $uid = $param['uid'];
        }
        if (isset($param['token']) && $param['token']) {
            $token = $param['token'];
        }
         if ($phone && $password && $code) {
            $r = Gokit_Http::post('app/users', [
                    'phone'    => $phone,
                    'password' => $password,
                    'code'     => $code
                ]);
            return $r;
        }

        return 'param error';
    }

    /**
     * 重置密码
     */
    public static function change_password($param)
    {
        $email = $phone = $new_pwd = '';

        // email
        if (isset($param['email']) && $param['email']) {
            $email = $param['email'];
        }
        // phone
        if (isset($param['phone']) && $param['phone']) {
            $phone = $param['phone'];
        }
        if (isset($param['code']) && $param['code']) {
            $code = $param['code'];
        }
        if (isset($param['new_pwd']) && $param['new_pwd']) {
            $new_pwd = $param['new_pwd'];
        }
        $r = Gokit_Http::post('app/reset_password', $param);

        return $r;
    }

}