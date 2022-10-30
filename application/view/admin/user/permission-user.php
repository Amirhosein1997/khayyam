<?php
$this->include('admin.layouts.header');
$update=false;
if (isset($_POST['send_access'])){
    $this->insert_permition();

}


?>

<!doctype html>
<html lang="en">
<head>

</head>
<body>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"> پیکربند دسترسی ها</h4>
    <hr>
    راهنمای سیستم!!!!!!!!!!!
</div>
<hr>
<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_update_access'):?>
<div class="alert alert-primary" role="alert">
    اپدیت شد.
</div>
<?php endif; ?>
<?php endif; ?>

<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_delete_access'):?>
<div class="alert alert-primary" role="alert">
    حذف شد.
</div>
<?php endif; ?>
<?php endif; ?>

<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_made_access'):?>
<div class="alert alert-primary" role="alert">
    مجوز ساخته شد.
</div>
<?php endif; ?>
<?php endif; ?>



<form method="post" enctype="multipart/form-data" style="border-radius: 5px;background-color: #0f6674;border: 1px solid;padding: 30px;box-shadow: 5px 10px 8px #888888;">
    <h5>ایجاد مجوز دسترسی</h5>
    <br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">عنوان مجوز/سمت در سیستم</label>
            <input  name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="لطفا عنوان مجوز را وارد کنید">
        </div>
        <div class="col">
            <label for="inputper" class="form-label">وضعیت مجوز</label>
            <select name="status" id="inputper" class="form-select">
                <option selected>__انتخاب وضعیت مجوز دسترسی</option>
                <option value="ON" >__فعال</option>
                <option value="OFF">__غیر فعال</option>
            </select>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <h5>مدیریت کاربران</h5>
            <br>
            <?php
            $dir_category='application/view/admin/user/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/user/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>


        </div>
        <div class="col">
            <h5>مدیریت اسلایدرها</h5>
            <br>
            <?php
            $dir_category='application/view/admin/slider/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/slider/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>




        </div>
        <div class="col">
            <h5>مدیریت صفحات</h5>
            <br>
            <?php
            $dir_category='application/view/admin/page/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/page/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>


        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <h5>مدیریت نوشته ها</h5>
            <br>
            <?php
            $dir_category='application/view/admin/article/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/article/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>


        </div>
        <div class="col">
            <h5>مدیریت ابزارک ها</h5>
            <br>
            <?php
            $dir_category='application/view/admin/widget/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/widget/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>


        </div>
        <div class="col">
            <h5>مدیریت دسته ها</h5>
            <br>
            <?php
            $dir_category='application/view/admin/category/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/category/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>


        </div>

    </div>
    <div class="row">
        <div class="col">
            <h5>مدیریت پیامک ها</h5>
            <br>
            <?php
            $dir_category='application/view/admin/sms/';
            $scan_dir=scandir($dir_category);
            foreach ($scan_dir as $key=>$file):
                $array_file=explode('.',$file);
                if (end($array_file)=="php"):
                    $title=$this->page_title("application/view/admin/sms/".$file).'';
                    if ($title!==''):
                        ?>
                        <div class="form-check">
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>




        </div>


    </div>
    <?php if($update): ?>
        <div class="mb-4 mt-3">
            <button style="float: left;" name="update_access" value="ویرایش مجوز"  type="submit" class="btn btn-primary">ویرایش مجوز</button>
        </div>
    <?php else:?>
        <div class="mb-4 mt-3">
            <button style="float: left;" name="send_access" value="ایجاد مجوز"  type="submit" class="btn btn-primary">ایجاد مجوز</button>
        </div>
    <?php endif; ?>





</form>

<br>
<hr>
<div>
    <h5 style="text-align: center;padding: 20px;background-color: #721c24">لیست دسترسی ها</h5>
    <hr>
    <?php include_once 'list_access.php' ?>

</div>

</body>
</html>

<?php
$this->include('admin.layouts.footer');
?>