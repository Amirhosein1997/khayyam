<?php
if (!isset($_SESSION['login'])){
    $this->route('user/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">
    <script src="https://cdn.tiny.cloud/1/yp32oxam6dc9luldn9u29mvhyo76y09lc3yslstrt7e7xj08/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="<?php $this->asset('css/tinymce_css.css');?>">
    <script src="<?php $this->asset('js/tinymce_js.js'); ?>"></script>
</head>

<body>
<div class="topmenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="<?php $this->url('user'); ?>">نمایش سایت</a>
                <a class="btn btn-danger" href="<?php $this->url('user/logout'); ?>">خروج</a>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="admin-container">
        <div class="row">
            <div class="col-md-2">
                <?php
                $this->include('admin.layouts.menu');
                ?>
            </div>

            <div class="col-md-10">
                <div class="content-panel">
                    <div class="container-fluid">
