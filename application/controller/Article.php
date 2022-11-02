<?php


namespace application\controller;
use application\model\Article as ArticleModel;
use application\model\Category;
use application\model\Model;


class Article extends Controller
{
    public function index()
    {
        $cat_name = array();
        $articles = new ArticleModel();
        $info_articles = $articles->all();
/*        foreach ($info_articles as $info){
                if (strpos($info->cat_id,',')){
                    $result = explode(',',$info->cat_id);
                    foreach ($result as $res){
                        $category->find($res);
                    }

                }
        }*/

            $this->view('admin.article.index',compact('info_articles'));
        }

    public function create()
    {
        $create = new Category();
        $categories = $create->all();
        $this->view('admin.article.create',compact('categories'));

        }

    public function store()
    {
 /*       var_dump($_POST);die();*/
            $insert = new ArticleModel();
            $title = $_POST['title'];
            $text = $_POST['text'];
            if(is_array($_POST['cat'])){
                $cat_id = implode(',',$_POST['cat']);
            }
            else{
                $cat_id = $_POST['cat'];
            }
            $pic = $_FILES['thumbnail'];
            $img = $insert->uploader($pic,'public/upload/');
            $author = $_SESSION['login'];
            $date = date('Y/m/d');
            $info = array($title,$text,$cat_id,$img,$author,$date);
            $insert->insert($info);
            $this->reback();
        }

    public function edit()
    {
        
        }

    public function update()
    {
        
        }

    public function destroy()
    {
        
        }

    public function article_menu($page)
    {
        $this->view('admin.article.'.$page);
        }

    public function add_article()
    {
        $model=new Model();
       /* if ($_POST['publish']){
            $status='publish';
        }elseif($_POST['save']){
            $status='save';
        }*/
        $status='save';
        $info=$_POST['info'];
        $img=$_FILES['img'];
        $cats=$_POST['cat'];
        $title=$info['title'];
        $code=$model->getRandomString('6');
        $text=$info['text'];
        $cat_id=implode(',',$cats);
        $articles_loc=$this->image_address('img/');
        if (!is_dir($articles_loc)){mkdir($articles_loc);}
        $image=$model->uploader($img, $articles_loc);
        $author=$_SESSION['login_user'];
        $date=date('Y/m/d');
        $article_model=new \application\model\Article();
        $list=[$code,$title,$text,$cat_id,$image,$author,$date,$status];
        $article_model->insert_article($list);
        $this->reback();
        }

    public function edit_article_page($id)
    {
        $article_model=new \application\model\Article();
        $article_record=$article_model->article_record($id);
        $this->view('admin.article.edit_article',compact('article_record'));
        }

    public function edit_article($id)
    {
            $status='save';
            $info=$_POST['info'];
            $image=$_FILES['img'];
            $cats=$_POST['cat'];
            $title=$info['title'];
            $articles_loc=$this->image_address('upload/');
            $model=new Model();
            $image_loc=$model->uploader($image,$articles_loc);

            $title=$info['title'];
            $text=$info['text'];
            if (is_array($cats)){$cats_ids=implode(',',$cats);
            }else{$cats_ids=$cats;}
            $author=$_SESSION['login'];
            $date=date('y/m/d');
            $article_model=new \application\model\Article();
            $list=[$title,$text,$cats_ids,$image_loc,$author,$date,$status,$id];
            $article_model->update_article($list);
            $this->reback();

    }

    public function delete_article($id)
    {
        $article_model=new \application\model\Article();
        $article_model->delete($id);
        $this->reback();
    }
}