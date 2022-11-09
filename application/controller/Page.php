<?php

namespace application\controller;

use application\model\Model;

class Page extends Controller
{
    public function page_menu($page)
    {
        $this->view('admin.page.'.$page);
    }

    public function insert_group_page()
    {
        $model=new Model();
        $info=$_POST['info'];
        $title=$info['title'];
        $description=$info['description'];
        $status=$info['status'];
        $code=$model->getRandomString(6);
        $author=$_SESSION['login'];
        $date=date('Y/m/d');
        $list=[$code,$title,$description,$author,$date,$status];
        $page_model=new \application\model\Page();
        $page_model->insert_group_page($list);
        $this->reback();
    }

    public function group_page_callback()
    {
        $page_model=new \application\model\Page();
        return $page_model->select_group_pages();

    }

    public function insert_page()
    {
        $page_model=new \application\model\Page();
        $model=new Model();
        $info=$_POST['info'];
        $code=$model->getRandomString(6);
        $parent=$info['parent'];
        $link=$info['link'];
        $title=$info['title'];
        $author=$_SESSION['login'];
        $date=date("y/m/d");
        $status=$info['status'];
        $list=[$code,$parent,$link,$title,$author,$date,$status];
        $page_model->insert_page($list);
        $this->reback();
    }

    public function delete_group_page($id)
    {
        $page_model=new \application\model\Page();
        $page_model->delete_group($id);
        $this->reback();
    }
    public function delete_page($id)
    {
        $page_model=new \application\model\Page();
        $page_model->delete_pages($id);
        $this->reback();
    }

    public function edit_group_page($id)
    {
        $page_model=new \application\model\Page();
        $group_page_reco=$page_model->select_group_page($id);
        $this->view('admin.page.edit_groupe_page',compact('group_page_reco'));

    }

    public function update_page_group($id)
    {
        $page_model=new \application\model\Page();
        $info=$_POST['info'];
        $title=$info['title'];
        $description=$info['description'];
        $author=$_SESSION['login'];
        $date=date("y/m/d");
        $status=$info['status'];
        $list=[$title,$description,$author,$date,$status,$id];
        $page_model->update_group_page($list);
        $this->reback();
    }

    public function edit_page($id)
    {
        $page_model=new \application\model\Page();
        $page_reco=$page_model->select_page($id);
        $this->view('admin.page.edit_page',compact('page_reco'));
    }

    public function update_page($id)
    {
        $info=$_POST['info'];
        $parent=$info['parent'];
        $title=$info['title'];
        $link=$info['link'];
        $author=$_SESSION['login'];
        $date=date("y/m/d");
        $status=$info['status'];
        $list=[$parent,$link,$title,$author,$date,$status,$id];
        $page_model=new \application\model\Page();
        $page_model->update_page($list);
        $this->reback();
    }

    public function insert_single_page()
    {
        $info=$_POST['info'];
        $btn_title=$_POST['btn_title'];
        $page=$_POST['page'];
        $title=$info['title'];
        $description=$info['description'];
        $code=$info['vid_link'];
        $author=$_SESSION['login_user'];
        $date=date('y/m/d');
        $status=$info['status'];
        $imploded_btn=implode(',',$btn_title);
        $imploded_page=implode(',',$page);
        $page_model=new \application\model\Page();

        $single_page_records=$page_model->select_single_page();
        if ($single_page_records ==""){
            $list=[$title,$description,$code,$imploded_btn,$imploded_page,$author,$date,$status];
            $page_model->insert_single_page($list);

        }else {
            $list=[$title,$description,$code,$imploded_btn,$imploded_page,$author,$date,$status];
            $page_model->update_single_page($list);
        }
        $this->reback();
    }
}