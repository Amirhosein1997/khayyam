<?php
$this->include('admin.layouts.header');
?>
<!DOCTYPE html>
<head>
    <title>ویرایش گروه صفحات ایجاد شده</title>
</head>
<?php


$parent_reco=$group_page_reco;



?>




<form style="padding: 30px;background-color: #884148;" method="post" enctype="multipart/form-data" action="<?php $this->url('Page/update_page_group/'.$parent_reco->id); ?>">
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان گروه</label>
        <input value="<?php echo $parent_reco->title ;?>" name="info[title]" type="text" class="form-control" id="exampleInput1" >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">شرح گروه</label>
        <input value="<?php echo $parent_reco->description; ?>" name="info[description]" type="text" class="form-control" id="exampleInput2">
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">وضعیت گروه</label>
        <select name="info[status]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__وضعیت گروه را انتخاب کنید</option>
            <option <?php if ($parent_reco->status=='on'){echo 'selected';} ?> value="on">__on</option>
            <option <?php if ($parent_reco->status=='off'){echo 'selected';} ?> value="off">__off</option>
        </select>
    </div>

    <button name="update" type="submit" class="btn btn-primary">ثبت</button>
</form>
<?php
$this->include('admin.layouts.footer');
?>