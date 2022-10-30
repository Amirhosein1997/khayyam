<?php
$this->include('admin.layouts.header');
if (isset($_POST['update_access'])){
    $id=$perm_record[0]->id;
    $this->update_perm($id);
}
?>

<form method="post" enctype="multipart/form-data" style="border-radius: 5px;background-color: #0f6674;border: 1px solid;padding: 30px;box-shadow: 5px 10px 8px #888888;">
    <h5>ایجاد مجوز دسترسی</h5>
    <br>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput" class="form-label">عنوان مجوز/سمت در سیستم</label>
            <input value="<?php echo $perm_record[0]->name;?>" name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="لطفا عنوان مجوز را وارد کنید">
        </div>
        <div class="col">
            <label for="inputper" class="form-label">وضعیت مجوز</label>
            <select name="status" id="inputper" class="form-select">
                <option selected>__انتخاب وضعیت مجوز دسترسی</option>
                <option value="ON" <?php  if ($perm_record[0]->status=='ON'){echo 'selected';} ?>>__فعال</option>
                <option value="OFF"<?php  if ($perm_record[0]->status=='OFF'){echo 'selected';} ?>>__غیر فعال</option>
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
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
                            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if(strpos($perm_record[0]->permition,$file) !==false){echo 'checked';} ?> id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $title; ?>
                            </label>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach;?>




        </div>


    </div>

        <div class="mb-4 mt-3">
            <button style="float: left;" name="update_access" value="ویرایش مجوز"  type="submit" class="btn btn-primary">ویرایش مجوز</button>
        </div>






</form>
<?php
$this->include('admin.layouts.footer');
?>