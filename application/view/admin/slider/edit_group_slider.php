<?php
$this->include('admin.layouts.header');
?>
<?php ?>




<h5>ویرایش دسته اسلایدی </h5>
<hr>

<form action="<?php $this->url('slider/insert_slider_group'); ?>" method="post" enctype="multipart/form-data" style="border: 10px solid #3928a2;padding: 30px;background-color: #3f8577" >
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان دسته اسلایدی</label>
        <input value="<?php echo $slider_group->title; ?>" name="info[title]" type="text" class="form-control" id="exampleInput1" required >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">تعداد اسلاید</label>
        <input value="<?php echo $slider_group->number; ?>" name="info[number]" type="text" class="form-control" id="exampleInput2" required>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">نام پوشه</label>
        <input value="<?php echo $slider_group->dir; ?>" name="info[dir_name]" type="text" class="form-control" id="exampleInput3" required>
    </div>
    <div class="form-check form-switch">
        <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال:</label>
        <input <?php if ($slider_group->status=='on'){echo 'checked';} ?> name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
    </div>
    <button name="send" type="submit" class="btn btn-primary">ثبت</button>
</form>





<?php
$this->include('admin.layouts.footer');
?>