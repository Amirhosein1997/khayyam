<?php
$this->include('admin.layouts.header');
?>
<p class="title-form">افزودن دسته جدید</p>
<form class="my-form" method="post" action="<?php $this->url('category/store'); ?>">
    <div class="row">
        <div class="col-md-9">


            <input class="form-control inputbig" type="text" name="title" placeholder="عنوان دسته را اینجا وارد کنید">

                <br>
            <input type="submit"  class="btn btn-primary" value="ایجاد دسته">
        </div>

    </div>
</form>
<?php
$this->include('admin.layouts.footer');
?>
