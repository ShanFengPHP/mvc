<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\wedring\public/../application/index\view\user\login.html";i:1499917324;}*/ ?>
﻿<html class="hb-loaded">
<head>
    <meta charset="utf-8" />
    <title>会员登录</title>
    <meta name="Keywords" content="Darry Ring钻戒价格,Darry Ring钻戒图片" />
    <meta name="Description" content="Darry Ring官网会员注册登录唯一入口，Darry Ring是求婚钻戒第一品牌，想了解Darry Ring实体店、Darry Ring哪里有卖等相关Darry Ring资讯就先进入戴瑞珠宝官网注册吧！" />
    <meta content="26403151123072464122121676375" property="qc:admins" />
    <link href="/index/css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--/*技术支持，小庄602842076     验证：官网技术支持*/
/*技术支持，小庄602842076    验证：官网技术支持*/
/*技术支持，小庄602842076    验证：官网技术支持*/
/*技术支持，小庄602842076    验证：官网技术支持*/
/*技术支持，小庄602842076    验证：官网技术支持*/
/*https://shop116998991.taobao.com/*/
/*https://shop116998991.taobao.com/*/
/*https://shop116998991.taobao.com/*/-->
    <script src="/index/js/jquery.js" type="text/javascript"></script>
    <script src="/index/js/common.js" type="text/javascript"></script>
    <div class="wrap">
        <!-- start of 头部导航-->
        <div class="head_top">
            <div class="head clearfix">
            <!--头部左边-->
                <div class="topLeft left">
                    <a href="/index/index/index" title="Darry Ring">
                        <img width="186" height="42" src="/index/images/logo_01.png " /> </a>
                    <span>求婚钻戒领导品牌</span>
                </div>
            <!--头部左边end-->
            <!--头部右边-->
                <ul class="topRight right">
                    <li>国际权威认证</li>
                    <li class="tr_2">15天无理由退换</li>
                    <li class="tr_3">终身保养</li>
                </ul>
            <!--头部左边end-->
            </div>
        </div>
        <!--end of 头部导航-->

        <!-- starto of container -->
        <div class="container">
            <!--中间内容-->
            <div class="cmain ddd">
                <!--内容右边-->
                <div class="cort-right right">
                    <div class="r_bg"></div>
                    <!--登陆框内-->
                    <form method="post" action="/index/index/index" id="loginform">
                        <div class="cr_border">
                            <h3></h3>
                            <!--邮箱-->
                            <div id="cssName" class="the_input ">
                                <span class="member"></span>
                                <input type="text" placeholder="请输入邮箱/手机号码" id="txtName" class="al_Input dr_email" value="" name="data[email]" />
                                <i id="tname"></i>
                            </div>
                            <!--邮箱end-->

                            <!--密码-->
                            <div style="margin-top:15px;" class="the_input" id="cssPwd">
                                <span class="password"></span>
                                <input type="password" placeholder="请输入密码" id="txtPwd" class="al_Input" value="" name="data[password]" />
                                <i id="pwdd"></i>
                            </div>
                            <!--验证码-->

                            <!--验证码end-->

                            <!--报错信息-->
                            <div class="ts_wrong" id="showWrong" style="display: none">
                                <span id="wrong"> <span id="Label1">Label</span></span>
                            </div>
                            <!--报错信息end-->

                            <!--其他选项-->
                            <div class="other_input">
                                <div class="left">
                                    <input type="checkbox" name="remember" id="check" value="1" />
                                    <label for="check">记住密码</label>
                                </div>
                                <div class="right">
                                    <a href="forget.html" class="forget">忘记密码</a>
                                </div>
                            </div>
                            <!--其他选项end-->

                            <!--按钮-->
                            <div class="other_input">
                                <div class="bt1 clearfix" id="login">
                                    <span class="left">注册</span>
                                    <span class="right focus">登录</span>
                                </div>
                            </div>
                            <!--按钮end-->

                            <!--其他合作-->
                            <script type="text/javascript" src="http://open.51094.com/user/myscript/15966e2d64f21a.html"></script>
                            <div class="other_hz">
                                <p>
                                    <span>更多合作网站帐号登录:</span>
                                    <span id="hzy_fast_login"></span>
                                    <a href="/syncLogin/qq" class="oth_qq" target="black"></a>
                                    <a href="/syncLogin/weibo" class="oth_wb" target="black"></a>
                                    <a href="/syncLogin/weixin" class="oth_wx" target="black"></a>
                                </p>
                            </div>
                            <!--其他合作end-->
                        </div>
                        <input type="hidden" value="index.html" name="forward" />
                    </form>
                    <!--登陆框内end-->
                </div>
                <!--内容右边end-->
            </div>
            <!--中间内容end-->
        </div>
        <!-- end of container -->

        <!--底部end-->
        <div class="cmain bc_yz">
            <div class="db_cort">
                <p>Copyright &copy; 2006-2015 www.Darryring.com 戴瑞珠宝 All Rights Reserved. 粤ICP备11012085号</p>
                <p>中国互联网违法信息举报中心 | 中国公安网络110报警服务 | 本网站提供所售商品的正式发票</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#login span').eq(0).click(function() {
                location.href = "/index/user/reg"
            });

            $('#login span').eq(1).click(function() {
                $('.ts_wrong').remove();
                $('.the_input').removeClass('error');
                if ($('#txtName').val() == '') {
                    var notice = '<div class="ts_wrong"><span id="wrong">请输入邮箱/手机号码！</span></div>';
                    $('#txtName').parent().after(notice);
                    $('#txtName').parent().addClass('error');
                    return false;
                }

                if ($('#txtPwd').val() == '') {
                    var notice = '<div class="ts_wrong"><span id="wrong">请输入密码！</span></div>';
                    $('#txtPwd').parent().after(notice);
                    $('#txtPwd').parent().addClass('error');
                    return false;
                }

                $('form').submit();
            });
        });

        $(document).keyup(function(event){
            if(event.keyCode ==13){
                $('#login span').eq(1).click();
            }
        });
    </script>
</body>
</html>