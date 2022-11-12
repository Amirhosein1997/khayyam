<?php

namespace application\model;

class Slider extends Model
{
    public function update_slider_status($list)
    {
        $query="update slider_tbl set status=? where parent=?";
        $this->execute($query,$list);
    }

    public function insert_slider_group($list)
    {
        $query="insert into slider_tbl (title, number, parent, dir, date, author, status) VALUES (?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function select_slider_group()
    {
        $query="select * from slider_tbl where parent=0 order by id desc";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }
    public function select_slider($id)
    {
        $query="select * from slider_tbl where id=? order by id desc";
        return $this->query($query,[$id])->fetch(\PDO::FETCH_OBJ);
    }

    public function delete_slide($id)
    {
        $query="delete from slider_tbl where id=?";
        $this->execute($query,[$id]);
    }

    public function insert_slider($list)
    {
        $query="insert into slider_tbl (title, number, parent, dir, date, author, status) VALUES (?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }
    public function select_sliders($parent)
    {
        $query="select * from slider_tbl where parent=$parent order by id desc";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }
    public function select_all_slider()
    {
        $query="select * from slider_tbl order by id desc";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }
    public function select_on_slider()
    {
        $query="select * from slider_tbl where status='on' and title='sub_slider'";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }
}