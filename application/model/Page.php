<?php

namespace application\model;

class Page extends Model
{
    public function insert_group_page($list)
    {
        $query="insert into page_groups (code, title, description, author, date, status) VALUES (?,?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function select_group_pages()
    {
        $query="select * from page_groups order by id desc ";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function link_page()
    {
        $query="select * from template_page ";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert_page($list)
    {
        $query="insert into page_tbl(code, parent,page_link, title, author, date, status ) VALUES (?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function select_pages()
    {
        $query="select * from page_tbl order by id desc ";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete_group($id)
    {
        $query="delete from page_groups where id=?";
        $this->execute($query,[$id]);
    }
    public function delete_pages($id)
    {
        $query="delete from page_tbl where id=?";
        $this->execute($query,[$id]);
    }

    public function select_group_page($id)
    {
        $query="select * from page_groups where id=?";
        return $this->query($query,[$id])->fetch(\PDO::FETCH_OBJ);
    }

    public function update_group_page($list)
    {
        $query="update page_groups set title=?,description=?,author=?,date=?,status=? where id=?";
        $this->execute($query,$list);
    }

    public function select_page($id)
    {
        $query="select * from page_tbl where id=?";
        return $this->query($query,[$id])->fetch(\PDO::FETCH_OBJ);
    }

    public function update_page($list)
    {
        $query="update page_tbl set parent=?,page_link=?,title=?,author=?,date=?,status=? where id=? ";
        $this->execute($query,$list);
    }

    public function select_single_page()
    {
        $query="select * from single_page";
        return $this->query($query)->fetch(\PDO::FETCH_OBJ);
    }

    public function insert_single_page($list)
    {
        $query="insert into single_page (title, description, video_code, btn_title, page_link, author, date, status) VALUES(?,?,?,?,?,?,?,? )";
        $this->execute($query,$list);
    }

    public function update_single_page($list)
    {
        $query="update single_page set title=?,description=?,video_code=?,btn_title=?,page_link=?,author=?,date=?,status=?";
        $this->execute($query,$list);
    }
}