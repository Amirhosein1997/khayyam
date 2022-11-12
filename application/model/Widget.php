<?php

namespace application\model;

class Widget extends Model
{
    public function insert_vid($list)
    {
        $query="insert into widget_tbl(title, sort, svg_code, author, date, status) VALUES (?,?,?,?,?,?)";
        $this->execute($query,$list);
}

    public function all_widget()
    {
        $query="select * from widget_tbl order by id desc ";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
}

    public function delete_widget($id)
    {
        $query="delete from widget_tbl where id=?";
        $this->execute($query,[$id]);
}

    public function select_widget($id)
    {
        $query="select * from widget_tbl where id=?";
        return $this->query($query,[$id])->fetch(\PDO::FETCH_OBJ);
}

    public function update_wid($list)
    {
        $query="update widget_tbl set title=?,sort=?,svg_code=?,author=?,date=?,status=? where id=?";
        $this->execute($query,$list);
    }
    public function all_on_widget()
    {
        $query="select * from widget_tbl where status='on'";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }
}