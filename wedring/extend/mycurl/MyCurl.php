<?php
namespace extend\mycurl;
class MyCurl
{
    public static function get($url)
    {
        //����curl��Դ
        $ch = curl_init() ;

        //���ò���
        curl_setopt($ch,CURLOPT_URL,$url);//���������ַ
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//�����Ƿ񷵻�����
        curl_setopt($ch,CURLOPT_HEADER,false);//�Ƿ���ʾ����ͷ
        curl_setopt($ch,CURLOPT_TIMEOUT,10);//���ó�ʱʱ�䣬��
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//�Ƿ�����ssl��֤
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//�Ƿ���֤����

        //��������
        $content = curl_exec($ch);

        //�ر�
        curl_close($ch);

        return $content;
    }

    public static function post($url,$data)
    {
        //����curl��Դ
        $ch = curl_init() ;

        //���ò���
        curl_setopt($ch,CURLOPT_URL,$url);//���������ַ
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//�����Ƿ񷵻�����
        curl_setopt($ch,CURLOPT_HEADER,false);//�Ƿ���ʾ����ͷ
        curl_setopt($ch,CURLOPT_TIMEOUT,10);//���ó�ʱʱ�䣬��
        curl_setopt($ch,CURLOPT_POST,true);//����post����
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//����post�������
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//�Ƿ�����ssl��֤
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//�Ƿ���֤����

        //��������
        $content = curl_exec($ch);

        //�ر�
        curl_close($ch);
        return $content;
    }
}