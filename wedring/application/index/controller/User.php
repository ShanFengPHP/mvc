<?php
/**
 * @Author: Marte
 * @Date:   2017-05-16 19:37:35
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-28 11:44:39
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use extend\alidayu\TopClient;
use extend\alidayu\AlibabaAliqinFcSmsNumSendRequest;

use think\Db;

class User extends Controller
{
    protected $user;
    public function _initialize()
    {
        $this->user = new UserModel();
    }

    //登录
    public function login()
    {
        return $this->fetch();
    }

    //登录处理
    public function checkLogin()
    {
        //获取表单数据
        $input = input();
        $username = $input['data']['email'];
        $password = $input['data']['password'];

        // file_put_contents('input.txt',$password);

        $tel = "/^1[34578]\d{9}$/";
        $email = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/";

        //检测，如果是手机号
        if (preg_match($tel,$username,$match)) {
            //查询数据库用户登录注册表
            $data = $this->user->selectMobile($username);

            // 判断用户账号是否存在
            if (empty($data)) {
                echo 0;
                return;
            }

            //判断用户密码是否正确
            if (!empty($data)) {
                if ($data[0]['password'] !== md5($password)) {
                    echo 1;
                    return;
                }
            }

            //把username、uid保存到Session
            session('username',$username);
            session('uid',$data[0]['id']);

            //查询数据库用户详细信息表
            $msg = $this->user->usersMobile($username);
            // 判断用户是否已完善信息
            if (empty($msg)) {
                echo 2;
                return;
            }

            echo 3;
            return;

        } elseif (preg_match($email,$username,$match)) {//检测，如果是邮箱
            //查询数据库用户登录注册表
            $data = $this->user->selectEmail($username);

            // 判断用户账号是否存在
            if (empty($data)) {
                echo 0;
                return;
            }

            //判断用户密码是否正确
            if (!empty($data)) {
                if ($data[0]['password'] != md5($password)) {
                   return 1;
                }
            }

            //把username、uid保存到Session
            session('username',$username);
            session('uid',$data[0]['id']);

            //查询数据库用户详细信息表
            $msg = $this->user->usersMobile($username);
            // 判断用户是否已完善信息
            if (empty($msg)) {
                echo 2;
                return;
            }

            echo 3;
            return;

        } else {
            echo 4;
            return;
        }
    }

    //忘记密码
    public function forget()
    {
        return $this->fetch();
    }

    //退出登录
    public function logout()
    {
        //清除session
        session(null);
        $this->redirect('/index/index/index');
    }

    //注册
    public function reg()
    {
        return $this->fetch();
    }

    //手机号注册处理
    public function mobileSign()
    {
        //获取表单数据
        $mobile = input('mobile');
        $password = input('pwd');
        $code = input('code');
        $telyzm = session('telyzm');
        //写入文件，查看获得的数据
        // file_put_contents('input.txt',$password);

        //判断用户是否已存在
        $data = $this->user->selectMobile($mobile);
        if (!empty($data)) {
            echo 0;
            return;

        } else {//检验验证码
            if ($code != $telyzm) {
                echo 1;
                return;
            }
        }

        //把数据插入到的数据库
        $data = ['tel' => $mobile,'password' => md5($password)];
        $this->user->insertInto($data);
        echo 2;
        return;
    }

    public function telyzm()
    {
        /***********************手机短信验证************************/
        //5ede03f3eb536afe91972c8a189ca97b
        // $yzm = "123";
        $mobile = input('mobile');

        //判断用户是否已存在
        $data = $this->user->selectMobile($mobile);
        if (!empty($data)) {
            echo 1;
        } else {
            $telyzm = rand(1000,9999);
            session('telyzm',$telyzm);
            $c = new TopClient;
            $c ->appkey = '24563092' ;
            $c ->secretKey = '5ede03f3eb536afe91972c8a189ca97b' ;
            $req = new AlibabaAliqinFcSmsNumSendRequest;
            $req ->setExtend( "" );
            $req ->setSmsType( "normal" );
            $req ->setSmsFreeSignName( "何旭峰" );
            $req ->setSmsParam( "{name:'用户',yzm:'$telyzm'}" );
            $req ->setRecNum($mobile);
            $req ->setSmsTemplateCode( "SMS_79585004" );
            $resp = $c ->execute( $req );
        }
    }

    //邮箱注册处理
    public function emailSign()
    {
        //获取表单数据
        $email = input('email');
        $password = input('pwd');
        $code = input('code');

        //写入文件，查看获得的数据
        // file_put_contents('input.txt',$code);

        //判断用户是否已存在
        // $data = Db::name('user')->where('email',$email)->select();
        $data = $this->user->selectEmail($email);

        if (!empty($data)) {
            echo 0;
            return;
        } else {
            if (!captcha_check($code)) {
                echo 1;
                return;
            }
        }

        //把数据插入到的数据库
        // $result = new UserModel();
        // $result->data([
        //         'email' => $email,
        //         'password' => md5($password)
        //     ]);
        // $result->save();
        $data = ['email' => $email,'password' => md5($password)];
        $this->user->insertInto($data);

        echo 2;
        return;
    }

    public function person()
    {
        //获取Session值
        $username = session('username');

        //分配变量
        $this->assign('username',$username);
        return $this->fetch();
    }

    public function person_check()
    {
        //获取Session值
        $username = session('username');

        //查询数据库，获得$username的相关内容
        $data = User::where('username',$username)->select();

        //获取表单内容
        $password = md5(input('pwd2'));
        $pwd1 = input('pwd1');
        $pwd2 = input('pwd2');
        $pwd3 = input('pwd3');
        $email = input('email');
        $code = input('code');

        //判断是否输入密码
        if (empty($pwd1)) {
            return 0;
        }

        if (empty($pwd2)) {
            return 1;
        }

        //判断原密码是否正确
        if (md5($pwd1) != $data[0]['password']) {
            return 2;
        }

        //判断密码是否符合规则
        $num = strlen($pwd2);
        $pattren = "/[0-9]{" . $num . "}/";
        $pattren1 = "/\w{6,18}/";
        if (preg_match($pattren,$pwd2,$match)){
            //是否为纯数字
            return 3;
        } elseif (!preg_match($pattren1,$pwd2,$match)) {
            //密码长度是否是6-18位
            return 4;
        } else {
            //判断两次新密码输入是否相同
            if ($pwd2 != $pwd3) {
                return 5;
            }
        }

        if(!captcha_check($code)){
            return 6;
        };

        //更新数据库信息
        User::where('username',$username)->update(['password'=>$password]);
        return 7;
    }

    public function notice()
    {
        return $this->fetch();
    }
}