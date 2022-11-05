<?php
$this->include('admin.layouts.header');
?>
<!DOCTYPE html>
<head>
    <title>افزودن اسلایدر به گروه اسلایدی</title>
</head>
<?php


$slider_group_record=$slider_record;





?>

<form method="post" enctype="multipart/form-data" action="<?php $this->url('slider/insert_sliders/'.$slider_record->id); ?>">
  <?php
    for ($i=0;$i<$slider_group_record->number;$i++):
  ?>
    <div class="mb-3">
        <label for="formFile" class="form-label">اسلاید شماره<?php echo $i+1; ?></label>
        <input name="file[]" class="form-control" type="file" id="formFile" required>
    </div>

<?php endfor;?>
    <a class="btn btn-primary" href="<?php $this->url('slider/slider_menu/slider_setting');  ?>" role="button">بازگشت</a>
    <input name="update" class="btn btn-primary" type="submit" value="ثبت">
</form>
<br><hr><br>

<?php

$sub_slider_record=$sliders_records;
$parent_record=$slider_record;



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
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sub_slider_record as $sub): ?>
            <tr>
                <td><?php echo $sub->title; ?></td>
                <td><?php echo $parent_record->title; ?></td>
                <td><?php echo $sub->date; ?></td>
                <td><?php echo $sub->author; ?></td>
                <td>ON</td>
                <td><img height="50px" width="100px" src="<?php
                    $exploded_dir=explode('/',$sub->dir);
                    $sliced_dir=array_slice($exploded_dir,3);
                    $mod_dir=implode('/',$sliced_dir);
                    echo '/'.$mod_dir; ?>"></td>
                <td><a class="btn btn-primary" href="<?php $this->url("slider/delete_slider_group/".$sub->id);?>" role="button">حذف</a></td>

            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


<?php
$this->include('admin.layouts.footer');
?>