<?php


namespace application\controller;
use application\model\Article;
use application\model\Model;
use application\model\User as UserModel;
use application\model\Category;
use SimpleXLSX;

class user extends Controller
{
    public function index()
    {
        $user = new UserModel();
        $users = $user->all();
        $this->view('app.index',compact('users'));
    }

    public function login()
    {
        $this->view('app.login');
        if ($_POST){
            $login = new UserModel();
            $res = $login->find($_POST['username']);
            //var_dump($res);
            if ($res){
                if ($res->password == $_POST['password']){
                    $_SESSION['login'] = $res->user_name;
                    $this->route('admin/index');
                }
                else{
                    ?>
                    <script>
                        var x= document.getElementById('password_err').style.display='block';
                    </script>
                    <?php
                }
            }
            else{
                ?>
                        <script>
                            var x= document.getElementById('username_err').style.display='block';
                        </script>
                <?php
            }
        }

    }

    public function logout()
    {
        session_destroy();
        $this->route('user/login');
    }



    public function register()
    {

        $this->view('app.register');
        $register = new UserModel();
        if ($_POST){
            $register->insert($_POST);
        }

    }

    public function user_menu($page)
    {
        $this->view('admin.user.'.$page);
    }

    public function insert_user(){
        $insert_model=new \application\model\User();
        $model=new Model();
        $info=$_POST['info'];
        $img=$_FILES['img'];
        $fullname=$info['fullname'];$Mcode=$info['Mcode'];$father_name=$info['father_name'];$birthday=$info['birthday'];
        $degree=$info['degree'];$field=$info['field'];$phone=$info['phone'];$state=$info['state'];$city=$info['city'];
        $email=$info['email'];$linkdin=$info['linkdin'];$instagram=$info['instagram'];$telegram=$info['telegram'];
        $home_address=$info['home_address'];$work_address=$info['work_address'];$skill=$info['skill'];
        $skill_desc=$info['skill_desc'];$permition=$info['permition'];$status=$info['status'];$author=$_SESSION['login'];
        $date_register=date("Y/m/d");
       // mkdir($main_dir);
        if($img['name'] !== ""){
            $dir_pics=$model->uploader($img,$this->image_address('img/'));
        }
        $password=sha1($Mcode);
        $list=[$email,$password,$fullname,$Mcode,$father_name,$birthday,$degree,$field,$phone,$state,$city,$email,$linkdin,$instagram,$telegram,$home_address,$work_address,$skill,$skill_desc,$dir_pics,$permition,$author,$date_register,$status];
        $insert_model->insert_user($list);

    }

    public function insert_excel()
    {
        $items=$_POST['item'];
        $xlsxfile=$_FILES['excel'];
        $location='public/templates/uploaded_excels/';

        include_once 'public/templates/xlsx.php';

            $excel=simpleXLSX::parse($_FILES['excel']['tmp_name']);
            $excel->rows();
            $i=0;
            foreach ($excel->rows() as $index=>$row){
                $q="";
                foreach ($row as $key=>$cell){
                    if ($i==0){
                        $q.="'".$cell."'varchar(50),";
                    }else{
                        $q.="'".$cell."',";
                    }
                }
                if ($i !==0){
                    $model=new \application\model\User();
                    $model->insert_bulk_user($q);

                }
                $i++;
            }

        $this->insert_info_file($items,$xlsxfile,$location);
        $this->update_info_bulk_user();

    }

    public function insert_info_file($items,$xlsxfile,$location)
    {
        $model=new \application\model\User();

        $new_location=$model->uploader($xlsxfile,$location);
        $title=$items['title'];
        $description=$items['desc'];
        $code = $model->getRandomString(6);
        $type='excel';
        $author=$_SESSION['login'];
        $date=date('Y/M/D');
        $part='group_user_register';
        $list=[$code,$title,$description,$type,$new_location,$author,$date,$part];
        $model->upload_file_tbl($list);

    }

    public function update_info_bulk_user()
    {
        $author=$_SESSION['login'];
        $date=date('Y/M/d');
        $model=new \application\model\User();
        $res=$model->find_system('system');
        foreach ($res as $user){
            $username=$user->email;
            $password=sha1($user->phone);
            $list=[$username,$password,$author,$date];
            $id=$user->id;
            $model->update_excel($list,$id);


        }
    }

    public function excels_list()
    {
        $model=new \application\model\User();
        return $model->excel_list();

    }

    public function page_title($url)
    {
        $fp = file_get_contents($url);
        if (!$fp) return null;
        $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
        if (!$res) return null;
        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }

    public function insert_permition()
    {
        $model=new \application\model\User();
        $page=$_POST['page'];
        $new_perm=implode(',',$page);
        $title=$_POST['title'];
        $status=$_POST['status'];
        $code=$model->getRandomString(6);
        $author=$_SESSION['login'];
        $date=date('Y,M,D');
        $model=new \application\model\User();
        $list=[$code,$title,$new_perm,$author,$date,$status];
        $model->insert_perm($list);
    }

    public function perm_list()
    {
        $model=new \application\model\User();
        return $model->permition_list();

    }

    public function delete_access($id)
    {
        $model=new \application\model\User();
        $list=[$id];
        $model->delete_perm($list);
        $this->reback();
    }

    public function edit_perm($id)
    {
        $model=new \application\model\User();
        $list=[$id];
        $perm_record=$model->select_perm($list);
        $this->view('admin.user.edit_perm',compact('perm_record'));
    }

    public function update_perm($id)
    {
        $title=$_POST['title'];
        $status=$_POST['status'];
        $page=implode(',',$_POST['page']);
        $author=$_SESSION['login'];
        $date=date('Y/m/d');
        $list=[$title,$page,$author,$date,$status,$id];
        $model=new \application\model\User();
        $model->update_permition($list);
        $this->reback();
    }

    public function all_users()
    {
        $model=new \application\model\User();
        return $model->select_all();
    }

    public function user_page($id)
    {

        $model=new \application\model\User();
        $user_record=$model->get_user($id);
        $this->view('admin.user.edit_user',compact('user_record'));
    }

    public function update_user($id,$info,$img)
    {
        $fullname=$info['fullname'];$Mcode=$info['Mcode'];$father_name=$info['father_name'];$birthday=$info['birthday'];
        $degree=$info['degree'];$field=$info['field'];$phone=$info['phone'];$state=$info['state'];$city=$info['city'];
        $email=$info['email'];$linkdin=$info['linkdin'];$instagram=$info['instagram'];$telegram=$info['telegram'];
        $home_address=$info['home_address'];$work_address=$info['work_address'];$skill=$info['skill'];
        $skill_desc=$info['skill_desc'];$permition=$info['permition'];$status=$info['status'];$author=$_SESSION['login'];
        $date_register=date('Y/M/D');
        $model=new \application\model\User();
        $last_info=$model->get_user($id);
        if ($img['name']!==""){
            unlink($last_info->image);
            $dir_pics=$model->uploader($img,$this->image_address('img/'));
        }else{
            $dir_pics=$last_info->image;
        }
        $password=sha1($Mcode);
        $list=[$email,$password,$fullname,$Mcode,$father_name,$birthday,$degree,$field,$phone,$state,$city,$email,$linkdin,$instagram,$telegram,$home_address,$work_address,$skill,$skill_desc,$dir_pics,$permition,$author,$date_register,$status,$id];
        $model->update_user($list);
        $this->route("user/user_menu/all_users");
    }
    public function article_page($id)
    {
        $article_model=new Article();
        $article_record=$article_model->article_record($id);
        $this->view('app.single',compact('article_record'));

    }
}
