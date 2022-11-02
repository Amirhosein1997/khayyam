<?php


namespace application\model;
use PDO;
use Exception;

class Category extends Model
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

    }

    public function find($id)
    {

    }

    public function insert($values)
    {

    }

    public function update($values,$id)
    {

    }

    public function delete($id)
    {

    }

    public function add_cat($list)
    {
        $query="insert into category_tbl (title, sort, parent, status) VALUES (?,?,?,?)";
        $this->execute($query,$list);
    }

    public function cat_list()
    {
        $query="select * from category_tbl where parent=0 order by sort";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function sub_cat($id)
    {
        $query="select * from category_tbl where parent=?";
        return $this->query($query,[$id])->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_cat($id)
    {
        $query="select * from category_tbl where id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function update_cat($list)
    {
        $query="update category_tbl set title=?,sort=?,parent=?,status=? where id=?";
        $this->execute($query,$list);
    }

    public function delete_cat($id)
    {
        $query="delete from category_tbl where id=?";
        $this->execute($query,[$id]);
    }
}