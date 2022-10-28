<?php
$this->include('admin.layouts.header');
?>
<!DOCTYPE html>
<head>
    <title>پیکربندی گروهی کاربران</title>
</head>

<?php
if (isset($_POST['send'])){
    if (isset($_FILES['excel']['name'])){
        $excel=new \application\controller\user();
        $excel->insert_excel();

    }
}

?>


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">تنطیمات کاربران</h4>
    راهنمای پنل!!!!!!!!!!
    <hr>

    <hr>
    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg> برای دریافت قالب فایل پیکربندی گروهی کاربران <a href="<?php $this->asset('templates/excel_templates/group_register_excel.xlsx'); ?>">اینجا</a> کلیک کنید.</p>

</div>

<div dir="rtl" style="background-color: #1a798c; padding:33px; ">
<form method="post" enctype="multipart/form-data" action="#" >
    <h5>ارسال فایل به سرور سیستم</h5>
    <hr>
<div class="row">
    <div class="col">
        <label class="form-label" for="v23">عنوان فایل</label>
        <input id="v23" name="item[title]" type="text" class="form-control" placeholder="لطفا عنوان فایل ارسالی را وارد کنید" >
    </div>
    <div class="col">
        <label class="form-label" for="v24">توضیحات فایل </label>
        <input id="v24" name="item[desc]" type="text" class="form-control" placeholder="توضیحات فایل ارسالی" >
    </div>
    <div class="col">
        <label class="form-label" for="v25">ارسال فایل پیکربندی</label>
        <input id="v25" name="excel" type="file" class="form-control" >
    </div>
</div>
    <div class="row">
        <div class="col mt-4">
            <button style="float: left;" type="submit" name="send" class="btn btn-primary">ایجاد کاربر</button>
        </div>
    </div>
</form>
</div>
<?php
$this->include('admin.layouts.footer');
?>