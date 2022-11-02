<?php


namespace application\controller;
use application\model\Category as CategoryModel;
use application\model\Model;

class Category extends Controller
{
    public function index()
    {
        $select = new CategoryModel();
       $res=  $select->all();
       // var_dump($select->all());die();
        $this->view('admin.category.index',compact('res'));
    }

    public function create()
    {
        $res = new CategoryModel();
        $this->view('admin.category.create');
    }

    public function store()
    {

        $insert = new CategoryModel();
        $insert->insert($_POST);
        $this->reback();
    }

    public function edit($id)
    {
        $edit = new  CategoryModel();
        $current_cat = $edit->find($id);
        $this->view('admin.category.edit',compact('current_cat'));
    }

    public function update($id)
    {
        $update = new CategoryModel();
        $update->update($_POST,$id);
        $res=  $update->all();
        $result = "ok_update";
        $this->view('admin.category.index',compact('res','result'));
    }


    public function destroy($id)
    {

            $delete = new CategoryModel();
            $delete->delete($id);
            $this->reback();
    }
    public function cat_menu($page)
    {
        $this->view('admin.category.'.$page);
    }

    public function add_cat($info)
    {
        $title=$info['title'];
        $sort=$info['sort'];
        $parent=$info['parent'];
        if (isset($info['status'])){
            $status='on';
        }else{
            $status='off';
        }
        $model=new \application\model\Category();
        $list=[$title,$sort,$parent,$status];
        $model->add_cat($list);
    }

    public function edit_cat($id)
    {
        $model=new \application\model\Category();
        $cat_record=$model->get_cat($id);
        $this->view('admin.category.edit_cat',compact('cat_record'));

    }

    public function update_cat($id,$info)
    {
        $title=$info['title'];
        $sort=$info['sort'];
        $parent=$info['parent'];
        if (isset($info['status'])) {
            $status='on';
        }else{
            $status='off';
        }
        $model=new \application\model\Category();
        $list=[$title,$sort,$parent,$status,$id];
        $model->update_cat($list);
        $this->reback();

    }

    public function delete_cat($id)
    {
        $model=new \application\model\Category();
        $model->delete_cat($id);
        $this->reback();
    }
}