<?php
$this->include('admin.layouts.header');
?>







<!DOCTYPE html>
<head>
    <title>افزودن دسته جدید</title>
</head>
<?php
if (isset($_POST['send'])){
    $info=$_POST['info'];

    $this->add_cat($info);

}
?>
<h5>افزودن دسته جدید</h5>
<br><hr>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">عنوان</label>
        <input type="text" name="info[title]" class="form-control" id="exampleInputEmail1" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>
        <input type="text" name="info[sort]" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">سرگروه یا زیرگروه</label>
        <select class="form-select" aria-label="Default select example" name="info[parent]">
            <option selected value="0">سرگروه</option>
            <?php
            $model=new \application\model\Category();
            $res=$model->cat_list();
            foreach ($res as $val):?>

            <option value="<?php echo $val->id; ?>"><?php echo $val->title; ?></option>

           <?php  endforeach;?>
        </select>
    </div>
    <div class="form-check form-switch">
        <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال</label>
        <input name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
    </div>
    <br>
    <button type="submit" name="send" class="btn btn-primary">ایجاد منو</button>

    <a class="btn btn-primary" href="<?php $this->url('category/cat_menu/cat_list'); ?>" role="button">بازگشت</a>
</form>












<?php
$this->include('admin.layouts.footer');
?>
