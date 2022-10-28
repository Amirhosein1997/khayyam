<?php


namespace application\controller;
use application\model\Article as ArticleModel;
use application\model\Category;
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
}