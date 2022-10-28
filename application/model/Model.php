<?php

namespace application\model;
use PDO;
use Exception;
class Model
{
    public function __construct()
    {
        $server="mysql:host=localhost;dbname=khayyam_mvc;charset=utf8";
        $user_db="root";
        $pass_db="";
        try {
            $this->pdo= new PDO($server,$user_db,$pass_db);
            //echo "اتصال به دیتابیس با موفقیت انجام شد"."<br>";
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        }
        protected function query($sql,$filter=null){
            try {
                if($filter==null){
                    return $this->pdo->query($sql);
                }
                else{
                    $res = $this->pdo->prepare($sql);
                    $res->execute($filter);
                    return $res;
                }
            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }
        protected function execute($sql,$filter=null){
            try {
                if($filter==null){
                    //دز exec کلا ما نمیتونیم برای کوئری مون شرطی اهمال کنیم و مقداری هم بر نمیگردونه
                    return $this->pdo->exec($sql);
                }
                else{
                    //کلا وقتی در Query مون شرط داریم باید از متد prepare استفاده کنیم چون باید execute بشه
                    $res = $this->pdo->prepare($sql);
                    $res->execute($filter);
                    return $res;
                }
            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }

    public function uploader($pic,$location)
    {
        $img_name = $pic['name'];
        $img_tmp = $pic['tmp_name'];
        $img_explode = explode('.',$img_name);
        $img_format = end($img_explode);
        $img_newname = time().".".$img_format;
        $new_location = $location.$img_newname;
        move_uploaded_file($img_tmp,$new_location);
        return $new_location;
        }
    function getRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }
}