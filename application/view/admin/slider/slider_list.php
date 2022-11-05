<?php
$this->include('admin.layouts.header');
?>


<!DOCTYPE html>
<head>
    <title>لیست اسلایدر های دسته اسلایدی</title>
</head>
<?php

    $slider_model=new \application\model\Slider();

    $all_subsliders=$slider_model->select_all_slider();


    ?>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">عنوان اسلاید</th>
            <th scope="col">دسته اسلایدی</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">کاربر</th>
            <th scope="col">وضعیت</th>
            <th scope="col">تصویر اسلاید</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($all_subsliders as $sub):

            $parent_record=$slider_model->select_slider($sub->parent);
            ?>

            <tr>
                <td><?php echo $sub->title; ?></td>
                <td><?php if ($parent_record){echo $parent_record->title;}else{echo 'parent';} ?></td>
                <td><?php echo $sub->date; ?></td>
                <td><?php echo $sub->author; ?></td>
                <td>ON</td>
                <td><img height="50px" width="100px" src="<?php echo $sub->dir; ?>"></td>
                <td><a class="btn btn-primary" href="dashboard.php?page=setting-slider" role="button">ویرایش</a></td>
                <td><a class="btn btn-primary" href="dashboard.php?page=setting-slider" role="button">حذف</a></td>

            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php
$this->include('admin.layouts.footer');
?>
