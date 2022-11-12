<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php $this->asset('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">


</head>
<body>

<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <img src="<?php $this->asset('img/logo.png') ?>" width="160" height="50">

            </div>
            <div class="col-md-6 link">
                <?php
                if (isset($_SESSION['login'])) {
                ?>
                <a href="<?php $this->url('admin'); ?>" class="login">ورود به داشبورد</a>
                <a href="<?php $this->url('user/logout'); ?>" class="sabtnam">خروج</a>
                <?php
                }
                else{
                    ?>
                <a href="<?php $this->url('user/login'); ?>" class="login">ورود به سایت</a>
                <a href="<?php $this->url('user/register'); ?>" class="sabtnam">ثبت نام کنید</a>
                <?php
                }
                ?>


            </div>


            <aside class="menu-bar">
                <nav id="menu_item">
                    <?php $category_model=new \application\model\Category();
                    $cats=$category_model->cat_list();
                    foreach ($cats as $category) :
                    ?>
                    <ul class="menu">
                        <li class="fa fa-wikipedia-w menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-7895">
                            <a href="https://websoft3.com/wordpress-tutorials/" dideo-checked="true"><?php  echo $category->title?></a>
                            <ul class="sub-menu">
                                <?php $subcats=$category_model->sub_cat($category->id);
                                foreach ($subcats as $subcat): ?>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2214">
                                    <a href="https://websoft3.com/category/wordpress-tutorials-article/video_wp_vip/"
                                       dideo-checked="true"><?php  echo $subcat->title?></a></li>

                                <?php endforeach; ?>
                            </ul>
                        </li>

                    </ul>
                    <?php endforeach; ?>
                </nav>
            </aside>
        </div>
    </div>
</div>
