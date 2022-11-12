<?php

namespace application\controller;
use application\model\Model;
use application\model\Sms as sms_model;

class Sms extends Controller
{
    public function sms_menu($page)
    {
        $this->view('admin.sms.'.$page);
    }

    public function insert_preset_sms()
    {
        $info=$_POST['info'];
        $text=$info['text'];
        $cat=$info['cat'];
        $author=$_SESSION['login'];
        $date=date("y/m/d");
        $status=$info['status'];
        $list=[$text,$cat,$author,$date,$status];
        $sms_model=new \application\model\Sms();
        $sms_model->insert_sms($list);
        $this->reback();
    }

    public function delete_preset($id)
    {
        $sms_model=new sms_model();
        $sms_model->delete_sms($id);
        $this->reback();
    }

    public function edit_preset($id)
    {
        $sms_model=new sms_model();
        $preset_record=$sms_model->select_preset($id);
        $this->view('admin.sms.edit_preset_sms',compact('preset_record'));

    }

    public function update_preset($id)
    {
        $info=$_POST['info'];
        $text=$info['text'];
        $cat=$info['cat'];
        $author=$_SESSION['login'];
        $date=date("Y/m/d");
        $status=$info['status'];
        $sms_model=new sms_model();
        $list=[$text,$cat,$author,$date,$status,$id];
        $sms_model->update_preset($list);
        $this->reback();
    }

    public function serv_numbers()
    {
        $url = "https://ippanel.com/services.jspd";
        $param = array
        (
            'uname'=>'',
            'pass'=>'',
            'op'=>'lines'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];
        $decode_res=json_decode($res_data);


        return $decode_res;
    }

    public function send_sms()
    {
        $info=$_POST['info'];
        $sender=$_SESSION['login'];
        $time=jdate("H:i:s");
        $date=jdate("y/m/d");
        $text=$info['text'];

        $from=$info['from'];
        $to=$info['to'];
        if (isset($info['preset_text'])){
            $sms_text=$info['preset_text'];
        }else{
            $sms_text=$text;
        }
        $url = "https://ippanel.com/services.jspd";

        $rcpt_nm = array($to);
        $param = array
        (
            'uname'=>'',
            'pass'=>'',
            'from'=>$from,
            'message'=>$sms_text,
            'to'=>json_encode($rcpt_nm),
            'op'=>'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];

        $sms_model=new sms_model();
        $list=[$res_data,$from,$to,$sms_text,$date,$time,$sender];
        $sms_model->send_sms($list);
        $this->reback();
    }

    public function send_ticket()
    {
        $model=new Model();
        $info=$_POST['info'];
        $file=$_FILES['file'];
        $title=$info['title'];
        $type=$info['type'];
        $level=$info['level'];
        $text=$info['text'];
        $date=date('y/m/d');
        $sms=$info['sms'];
        $sender=$_SESSION['login'];
        $file_loc=$model->uploader($file,'public/img/ticket/');
        $list=[$title,$type,$level,$sms,$text,$file_loc,$date,$sender];
        $sms_model=new \application\model\Sms();
        $sms_model->insert_ticket($list);
        $this->reback();
    }
}