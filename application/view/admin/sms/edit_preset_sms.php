<?php
$this->include('admin.layouts.header');
?>
<head>
    <title>
        ویرایش پیامک پیش فرض
    </title>
</head>


<h5>
    ویرایش پیامک پیشفرض
</h5>
<hr>
<form style="background-color: #718545;padding: 30px;" method="post" enctype="multipart/form-data" action="<?php $this->url('Sms/update_preset/'.$preset_record->id); ?>">
    <div class="mb-3 mt-3">
        <label for="comment">متن پیامک پیش فرض:</label>
        <textarea required class="form-control" rows="4" id="comment" name="info[text]"><?php echo $preset_record->text; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="sel1" class="form-label">گروه پیامکی:</label>
        <select required class="form-select" id="sel1" name="info[cat]">
            <option <?php if ($preset_record->cat=='مشتریان'){echo 'selected';} ?> value="مشتریان">__مشتریان</option>
            <option <?php if ($preset_record->cat=='همکاران'){echo 'selected';} ?> value="همکاران">__همکاران</option>
            <option <?php if ($preset_record->cat=='مدیران'){echo 'selected';} ?> value="مدیران">__مدیران</option>

        </select>
    </div>
    <div class="mb-3">
        <label for="sel2" class="form-label">وضعیت:</label>
        <select required class="form-select" id="sel2" name="info[status]">
            <option selected>وضعیت مورد نطر را انتخاب کنید</option>
            <option <?php if ($preset_record->status=='on'){echo 'selected';} ?> value="on">فعال</option>
            <option <?php if ($preset_record->status=='off'){echo 'selected';} ?> value="off">غیره فعال</option>

        </select>
    </div>
    <button name="update" type="submit" class="btn btn-primary">ویرایش</button>
    <a href="<?php $this->url('Sms/sms_menu/setting_sms'); ?>" class="btn btn-secondary">بازگشت</a>
</form>
<?php
$this->include('admin.layouts.footer');
?>