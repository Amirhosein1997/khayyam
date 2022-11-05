<?php

namespace application\controller;

class Widget extends Controller
{
    public function widget_menu($page)
    {
        $this->view("admin.widget.".$page);
    }

    public function insert_widget()
    {
        $titles=$_POST['title'];
        $sorts=$_POST['sort'];
        $svgs=$_POST['icon'];
        $status=$_POST['status'];
        foreach ($titles as $key=>$title){
            $sort=$sorts[$key];
            $svg=$svgs[$key];
            $stat=$status[$key];
            $author=$_SESSION['login'];
            $date=date("Y/m/d");
            $model=new \application\model\Widget();
            $list=[$title,$sort,$svg,$author,$date,$stat];
            $model->insert_vid($list);
        }
        $this->reback();
    }

    public function delete_widget($id)
    {
        $widget_model=new \application\model\Widget();
        $widget_model->delete_widget($id);
        $this->reback();
    }

    public function edit_widget($id)
    {
        $widget_model=new \application\model\Widget();
        $wid_record=$widget_model->select_widget($id);
        $this->view('admin.widget.edit_widget',compact('wid_record'));
    }

    public function update_widget($id)
    {
        $info=$_POST['info'];
        $title=$info['title'];
        $sort=$info['sort'];
        $svg=$info['icon'];
        $status=$info['status'];
        $author=$_SESSION['login'];
        $date=date("Y/m/d");
        $list=[$title,$sort,$svg,$author,$date,$status,$id];
        $widget_model=new \application\model\Widget();
        $widget_model->update_wid($list);
        $this->reback();
    }
}
