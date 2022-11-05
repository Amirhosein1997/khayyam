<?php

namespace application\controller;
use application\model\Slider as slider_model;
use application\model\model;
class Slider extends Controller
{

    public function slider_menu($page)
    {
        $this->view('admin/slider/'.$page);
    }

    public function insert_slider_group()
    {
        $info=$_POST['info'];
        $title=$info['title'];
        $number=$info['number'];
        $parent=0;
        $folder_name=$info['dir_name'];
        $loc=$_SERVER['DOCUMENT_ROOT']."/khayyam_mvc/public/img/slider/".$folder_name;

        if (!is_dir($loc)){mkdir($loc);}
        $date=date("y/m/d");
        $author=$_SESSION['login'];
        $status1=$info['status'];
        if ($status1){
            $status='on';
            $others='off';
            $slider_model=new \application\model\Slider();
            $list=[$others,$parent];
            $slider_model->update_slider_status($list);
        }else{
            $status='off';
        }
        $list1=[$title,$number,$parent,$loc,$date,$author,$status];
        $slider_model->insert_slider_group($list1);
        $this->reback();

    }

    public function edit_slider_group($id)
    {
        $slider_model=new \application\model\Slider();
        $slider_group=$slider_model->select_slider($id);
        $this->view('admin.slider.edit_group_slider',compact('slider_group'));
    }

    public function edit_slider($id)
    {
            $slider_model=new \application\model\Slider();
            $slider_record=$slider_model->select_slider($id);
            $sliders_records=$slider_model->select_sliders($slider_record->id);
            $this->view('admin.slider.add_slider',compact('slider_record','sliders_records'));

    }

    public function delete_slider_group($id)
    {
        $slider_model=new \application\model\Slider();
        $slider_model->delete_slide($id);
        $this->reback();
    }

    public function insert_sliders($id)
    {
        $slider_model=new \application\model\Slider();
        $model=new Model();
        $slider_group_record=$slider_model->select_slider($id);
        $dir=$slider_group_record->dir."/";

        foreach ($_FILES['file']['name'] as $key=>$val){
            $tmp_name=$_FILES['file']['tmp_name'][$key];
            $file_name=$_FILES['file']['name'][$key];
            $exploded_name=explode('.',$file_name);
            $file_format=end($exploded_name);
            $new_name=time().".".$file_format;
            $new_loc=$dir.$new_name;
            move_uploaded_file($tmp_name,$new_loc);
            $location=$new_loc;
            $number="";
            $title='sub_slider';
            $date=date("y/m/d");
            $author=$_SESSION['login'];
            $status='on';
            $list=[$title,$number,$id,$location,$date,$author,$status];
            $slider_model->insert_slider($list);
        }
        $this->reback();

    }

    public function go_back()
    {
        $this->reback();
    }

}





