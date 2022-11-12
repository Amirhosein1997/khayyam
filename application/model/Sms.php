<?php

namespace application\model;

class Sms extends Model
{
    public function insert_sms($list)
    {
        $query="insert into preset_sms(text, cat, author, date, status) VALUES(?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function select_preset_sms()
    {
        $query="select * from preset_sms order by id desc ";
        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete_sms($id)
    {
        $query="delete from preset_sms where id=?";
        $this->execute($query,[$id]);
    }

    public function select_preset($id)
    {
        $query="select * from preset_sms where id=?";
        return $this->query($query,[$id])->fetch(\PDO::FETCH_OBJ);
    }

    public function update_preset($list)
    {
        $query="update preset_sms set text=?,cat=?,author=?,date=?,status=? where id=?";
        $this->execute($query,$list);
    }

    public function send_sms($list)
    {
        $query="insert into send_sms (code, from_num, to_num, text, date, time, sender) VALUES (?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }

    public function insert_ticket($list)
    {
        $query="insert into ticket_tbl(title, type, level,sms_status, text, file_loc, date, sender) VALUES(?,?,?,?,?,?,?,?)";
        $this->execute($query,$list);
    }
}