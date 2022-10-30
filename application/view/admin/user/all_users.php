<?php
$this->include('admin.layouts.header');
?>


<?php
    $result_search="";
    $result_search_permition="";
    $count_search=0;

    if (isset($_POST['search_permition'])){
        $code_permition=$_POST['permition_id'];
        $model=new \application\model\User();

        $info_item=$model->search_users_permition($code_permition);
        if (count($info_item)){
            $result_search_permition='yes';
            $count_result_search_permition=count($info_item);
        }else{
            $result_search_permition='no';
        }
    }
    if (isset($_POST['search'])){
        $info=$_POST['inspect'];
        $model=new \application\model\User();
        $info_id=$model->search_pattern($info);
        if (count($info_id)){
            $result_search='yes';
            $count_search=count($info_id);
        }else{
            $result_search='no';
        }

    }




    ?>
    <!DOCTYPE html>
    <head>
        <title>مشاهده لیست کاربران</title>
    </head>
    <?php $users=$this->all_users();
    if (count($users)==0):
        ?>
        <div class="alert alert-primary" role="alert">
            NO USERS!
        </div>
    <?php endif;?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">تنطیمات کاربران</h4>
        <p>
            راهنمای سیستم!!!!!!
        </p>
        <hr>
        <?php include_once 'search_user_permition.php'?>
        <br>
        <?php include_once 'search_user_info.php'?>
    </div>
    <hr>
    <br>
    <?php if ($result_search=='yes'): ?>
    <div class="alert alert-primary" role="alert">
        نتایج: <?php echo $count_search ?>
        <a href="dashboard.php?page=list-users&count_search=0">بازگشت</a>
    </div>
<?php endif;?>
    <?php if ($result_search_permition=='yes'): ?>
    <div class="alert alert-primary" role="alert">
        نتایج:<?php echo $count_result_search_permition ?>
        <a href="dashboard.php?page=list-users&count_search=0">بازگشت</a>
    </div>
<?php endif;?>
    <div class="row">
    <?php
    if ($result_search=="yes"):
        foreach ($info_id as $val):
            ?>
            <div class="col-3">
                <div class="card" style="width:250px;height:400px;">
                    <a href="<?php $this->url('user/user_page/'.$val->id); ?>" >
                        <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                            <img style="width:200px;height:100px;" src="<?php echo $val->image ?>" class="card-img-top" alt="image">
                            <hr>
                            <h5 class="card-title"><?php echo $val->full_name ?></h5>
                            <div class="card-text">
                                <div>
                                    <?php
                                    echo $val->permition;
                                    ?>
                                </div>
                                <div>
                                    <?php echo $val->birthday; ?><br>
                                    <?php echo $val->skills; ?><br>
                                    <?php echo $val->email; ?><br>
                                    <?php echo $val->status; ?><br>

                                </div>
                            </div>
                    </a>
                </div>
            </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    </div>
    <div class="row">
    <?php
    if ($result_search_permition=="yes"):
        foreach ($info_item as $vers=>$item):
            ?>
            <div class="col-3">
                <div class="card" style="width:250px;height:400px;">
                    <a href="<?php $this->url('user/user_page/'.$item->id); ?>" >
                        <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                            <img style="width:200px;height:100px;" src="<?php echo $item->image ?>" class="card-img-top" alt="image">
                            <hr>
                            <h5 class="card-title"><?php echo $item->full_name ?></h5>
                            <div class="card-text">
                                <div>
                                    <?php
                                    echo $item->permition;
                                    ?>
                                </div>
                                <div>
                                    <?php echo $item->birthday;?> <br>
                                    <?php echo $item->skills; ?><br>
                                    <?php echo $item->email; ?><br>
                                    <?php echo $item->status; ?><br>

                                </div>
                            </div>
                    </a>
                </div>
            </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    </div>
    <div class="row">
    <?php
    if ($result_search==""):
        if ($result_search_permition==""):
            foreach ($users as $index=>$user):
                ?>
                <div class="col-3">
                    <div class="card" style="width:250px;height:400px;">
                        <a  href="<?php $this->url('user/user_page/'.$user->id); ?>">
                            <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                                <img style="width:200px;height:100px;" src="<?php echo $user->image ?>" class="card-img-top" alt="image">
                                <hr>
                                <h5 class="card-title"><?php echo $user->full_name ?></h5>
                                <div class="card-text">
                                    <div>
                                        <?php
                                        echo $user->permition;
                                        ?>
                                    </div>
                                    <div>
                                        <?php echo $user->birthday; ?><br>
                                        <?php echo $user->skills; ?><br>
                                        <?php echo $user->email; ?><br>
                                        <?php echo $user->status; ?><br>

                                    </div>
                                </div>
                        </a>
                    </div>
                </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    <?php endif;?>

    </div>



<?php
$this->include('admin.layouts.footer');
?>