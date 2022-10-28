<?php


namespace application\model;
use PDO;
use Exception;

class User extends Model
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
        $query = "SELECT * FROM users_tbl";
       return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $query = "SELECT * FROM users_tbl WHERE user_name=?";
       return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query = "INSERT INTO users_tbl (user_name,password) VALUES (?,?)";
        $this->execute($query,array_values($values));
    }

    public function insert_user($val)
    {
        $query="insert into users_tbl(user_name, password, full_name, National_code, father_name, birthday, degree, field, phone, state, city, email, linkdin, instagram, telegram, home_address, work_address, skills, skills_desc, image, permition, author, register_date, status ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->execute($query,array_values($val));
    }

    public function update($values,$id)
    {
        $query = "UPDATE users_tbl SET user_name=? , password=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query = "DELETE FROM users_tbl WHERE id=?";
        $this->execute($query,$id);
    }

    public function insert_bulk_user($q)
    {
        $query="insert into users_tbl(user_name, password, full_name, National_code, father_name, birthday, degree, field, phone, state, city, email, linkdin, instagram, telegram, home_address, work_address, skills, skills_desc, image, permition, author, register_date, status) values(".rtrim($q,",").");";
        $this->execute($query);
    }

    public function upload_file_tbl($list)
    {
        $query=("insert into upload_file_tbl(code, name, description, type, path, author, date, part)values(?,?,?,?,?,?,?,?);");
        $this->execute($query,array_values($list));
    }
    public function find_system($id)
    {
        $query = "select * from users_tbl where author=?";
        return $this->query($query,[$id])->fetchAll(PDO::FETCH_OBJ);
    }

    public function update_excel($val,$id)
    {
        $query = "UPDATE users_tbl SET user_name=?,password=?,author=?,register_date=? where id=?";
        $this->execute($query,array_merge(array_values($val),[$id]));
    }

    public function excel_list()
    {
        $query = "SELECT * FROM upload_file_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }


}