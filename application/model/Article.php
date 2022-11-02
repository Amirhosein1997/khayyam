<?php


namespace application\model;
use Exception;
use PDO;

class Article extends Model
{
    /*    public function show(){
            $query = "SELECT * FROM users_tbl";
            $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
        }

        public function delete($id)
        {
            $query = "DELETE FROM users_tbl WHERE id = '$id'";
            $this->execute($query ,$id);
        }*/
    public function all()
    {
        $query = "SELECT * FROM article_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function article_record($id)
    {
        $query = "SELECT * FROM article_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query = "INSERT INTO article_tbl (title,text,cat_id,img,author) VALUE (?,?,?,?,?)";
        $this->execute($query,array_values($values));
    }

    public function update($values,$id)
    {
        $query = "UPDATE article_tbl SET title=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query = "DELETE FROM article_tbl WHERE id=?";
        $this->execute($query,[$id]);
    }

    public function insert_article($list)
    {
        $query="insert into article_tbl (code_article, title, text, cat_id, img, author, date, status) VALUES (?,?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function select_articles()
    {
        $query="select * from article_tbl order by id desc ";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function update_article($list)
    {
        $query="update article_tbl set title=?,text=?,cat_id=?,img=?,author=?,date=?,status=? where id=?";
        $this->execute($query,$list);
    }
}