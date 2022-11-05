<?php
$this->include('admin.layouts.header');
?>







    <!DOCTYPE html>
    <head>
        <title>افزودن دسته اسلایدی جدید</title>
    </head>



    <h5>افزودن دسته اسلایدی جدید</h5>
    <hr>
    <form action="<?php $this->url('slider/insert_slider_group'); ?>" method="post" enctype="multipart/form-data" style="border: 10px solid #3928a2;padding: 30px;background-color: #3f8577" >
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">عنوان دسته اسلایدی</label>
            <input name="info[title]" type="text" class="form-control" id="exampleInput1" required >
        </div>
        <div class="mb-3">
            <label for="exampleInput2" class="form-label">تعداد اسلاید</label>
            <input name="info[number]" type="text" class="form-control" id="exampleInput2" required>
        </div>
        <div class="mb-3">
            <label for="exampleInput3" class="form-label">نام پوشه</label>
            <input name="info[dir_name]" type="text" class="form-control" id="exampleInput3" required>
        </div>
        <div class="form-check form-switch">
            <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال:</label>
            <input name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        </div>
        <button name="send" type="submit" class="btn btn-primary">ثبت</button>
    </form>






    <!DOCTYPE html>
    <head>
        <title>مشاهده همه دسته های اسلایدی</title>
    </head>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">عنوان گروه</th>
            <th scope="col">تعداد اسلاید</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">کاربر</th>
            <th scope="col">وضعیت</th>
            <th scope="col">مسیر</th>
            <th scope="col">ویرایش</th>
            <th scope="col">افزودن اسلاید</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $slider_model=new \application\model\Slider();
        $sliders_parents=$slider_model->select_slider_group();
        foreach ($sliders_parents as $parent):
            ?>
            <tr>
                <td><?php echo $parent->title; ?></td>
                <td><?php echo $parent->number; ?></td>
                <td><?php echo $parent->date; ?></td>
                <td><?php echo $parent->author; ?></td>
                <td><?php echo $parent->status; ?></td>
                <td><?php echo $parent->dir; ?></td>
                <td><a class="btn btn-primary" href="<?php $this->url('slider/edit_slider_group/'.$parent->id); ?>" role="button">ویرایش</a></td>
                <td><a class="btn btn-primary" href="<?php $this->url('slider/edit_slider/'.$parent->id); ?>" role="button">افزودن اسلاید</a></td>
                <td><a class="btn btn-primary" href="<?php $this->url('slider/delete_slider_group/'.$parent->id); ?>" role="button">حذف</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>



























<?php
$this->include('admin.layouts.footer');
?>