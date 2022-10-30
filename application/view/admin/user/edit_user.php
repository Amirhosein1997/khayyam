<?php
$this->include('admin.layouts.header');
?>


<?php

if (isset($_POST['update'])){
    $info=$_POST['info'];
    $img=$_FILES['img'];
    $id=$user_record->id;
    $this->update_user($id,$info,$img);

  //  $result='ok_update_user';
  //  header("location:dashboard.php?page=list-users&op={$result}");

}
if (isset($_POST['delete'])){
    $model=new \application\model\User();
    $model->delete_user($user_record->id);
    $this->route("user/user_menu/all_users");
 //   $result='ok_delete_user';
  //  header("location:dashboard.php?page=list-users&op={$result}");
}





?>



    <!DOCTYPE html>
    <head>
        <title>ویرایش اطلاعات کاربران</title>
    </head>

    <div dir="rtl" style="background-color: #1a798c; padding:50px; ">
        <form  method="post" enctype="multipart/form-data">
            <h5 >اطلاعات شخصی</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <label  for="v1" class="form-label">نام و نام خانوادگی</label>
                    <input value="<?php echo $user_record->full_name ?>" id="v1" name="info[fullname]" type="text" class="form-control" placeholder="لطفا نام و نام خانوادگی را وارد نمایید"  >
                </div>
                <div class="col">
                    <label for="v2" class="form-label">کد ملی</label>
                    <input value="<?php echo $user_record->National_code ?>" id="v2"  name="info[Mcode]" type="number" class="form-control" placeholder="لطفا کد ملی را وارد نمایید"  >
                </div>
                <div class="col">
                    <label for="v3" class="form-label">نام پدر</label>
                    <input value="<?php echo $user_record->father_name ?>" id="v3" name="info[father_name]" type="text" class="form-control" placeholder="لطفا نام پدر را وارد نمایید" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="v4" class="form-label">تاریخ تولد</label>
                    <input value="<?php echo $user_record->birthday ?>" id="v4" name="info[birthday]" type="text" class="form-control" placeholder="لطفا تاریخ تولد را وارد نمایید" >
                </div>
                <div class="col">
                    <label for="v5" class="form-label">مدرک تحصیلی</label>
                    <select id="v5" name="info[degree]" class="form-select"  >
                        <option selected>__انتخاب کنید</option>
                        <option value="کاردانی" <?php if ($user_record->degree=='کاردانی'){echo 'selected';} ?>>کاردانی</option>
                        <option value="کارشناسی"<?php if ($user_record->degree=='کارشناسی'){echo 'selected';} ?>>کارشناسی</option>
                        <option value="ارشد"<?php if ($user_record->degree=='ارشد'){echo 'selected';} ?>>ارشد</option>
                        <option value="دکترا"<?php if ($user_record->degree=='دکترا'){echo 'selected';} ?>>دکترا</option>
                    </select>
                </div>
                <div class="col">
                    <label for="v6" class="form-label">رشته تحصیلی</label>
                    <input value="<?php echo $user_record->field ?>" id="v6" name="info[field]" type="text" class="form-control" placeholder="لطفا مدرک تحصیلی را وارد نمایید">
                </div>
            </div>
            <br>
            <h5>اطلاعات تماس</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="v7" class="form-label">تلفن تماس</label>
                    <input value="<?php echo $user_record->phone ?>" id="v7" name="info[phone]" type="number" class="form-control" placeholder="لطفا تلفن تماس را وارد نمایید"  >
                </div>
                <div class="col">
                    <label for="v8" class="form-label">استان</label>
                    <select id="v8" name="info[state]" class="form-select" >
                        <option selected>__انتخاب کنید</option>
                        <option value="خراسان" <?php if ($user_record->state=='خراسان'){echo 'selected';} ?>>خراسان</option>
                        <option value="تهران" <?php if ($user_record->state=='تهران'){echo 'selected';} ?>>تهران</option>
                        <option value="شیراز" <?php if ($user_record->state=='شیراز'){echo 'selected';} ?>>شیراز</option>
                        <option value="مرکزی" <?php if ($user_record->state=='مرکزی'){echo 'selected';} ?>>مرکزی</option>
                    </select>
                </div>
                <div class="col">
                    <label for="v9" class="form-label">شهر</label>
                    <input value="<?php echo $user_record->city ?>" id="v9" name="info[city]" type="text" class="form-control" placeholder="لطفا شهر را وارد نمایید" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="v10" class="form-label">ادرس ایمیل</label>
                    <input value="<?php echo $user_record->email ?>" id="v10" name="info[email]" type="email" class="form-control" placeholder="لطفا ایمیل را وارد نمایید"  >
                </div>
                <div class="col">
                    <label for="v11" class="form-label">لینکدین</label>
                    <input value="<?php echo $user_record->linkdin ?>" id="v11" name="info[linkdin]" type="text" class="form-control" placeholder="لطفا لینکدین را وارد نمایید" >
                </div>
                <div class="col">
                    <label for="v12" class="form-label">اینستاگرم</label>
                    <input value="<?php echo $user_record->instagram ?>" id="v12" name="info[instagram]" type="text" class="form-control" placeholder="لطفا اینستاگرم را وارد نمایید" >
                </div>
                <div class="col">
                    <label for="v13" class="form-label">تلگرام</label>
                    <input value="<?php echo $user_record->telegram ?>" id="v13" name="info[telegram]" type="text" class="form-control" placeholder="لطفا نام تلگرام را وارد نمایید" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="v14" class="form-label">ادرس محل زندگی</label>
                    <input value="<?php echo $user_record->home_address ?>" id="v14" name="info[home_address]" type="text" class="form-control" placeholder="لطفا ادرس محل زندگی را وارد نمایید" >
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <label for="v15" class="form-label">ادرس محل کار</label>
                    <input value="<?php echo $user_record->work_address ?>" id="v15" name="info[work_address]" type="text" class="form-control" placeholder="لطفا ادرس محل کار را وارد نمایید" >
                </div>
            </div>
            <br>
            <h5>اطلاعات مهارتی</h5>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <label for="v16" class="form-label">مهارت شاخص</label>
                    <select id="v16" name="info[skill]" class="form-select" >
                        <option selected>__انتخاب کنید</option>
                        <option value="مهارت_علمی" <?php if ($user_record->skills=='مهارت_علمی'){echo 'selected';} ?>>مهارت علمی</option>
                        <option value="مهارت_ورزشی" <?php if ($user_record->skills=='مهارت_ورزشی'){echo 'selected';} ?>>مهارت ورزشی</option>
                        <option value="مهارت_فنی" <?php if ($user_record->skills=='مهارت_فنی'){echo 'selected';} ?>>مهارت فنی</option>
                        <option value="مهارت_هنری" <?php if ($user_record->skills=='مهرت_هنری'){echo 'selected';} ?>>مهرت هنری</option>
                    </select>
                </div>
                <div class="col">
                    <label for="v17" class="form-label">شرح مهارت</label>
                    <input value="<?php echo $user_record->skills_desc ?>" id="v17" name="info[skill_desc]" type="text" class="form-control" placeholder="لطفاشرح مهارت را وارد نمایید" >
                </div>
            </div>
            <br>
            <h5>تصویر پرسنلی و دسترسی ها</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="v18" class="form-label">انتخاب تصویر پرسنلی</label>
                    <input id="v18" name="img" type="file" class="form-control"  >
                </div>
                <div class="col">
                    <label  class="form-label">مجوز دسترسی</label>
                    <select  name="info[permition]" class="form-select" >
                        <option value="" selected disabled>__انتخاب کنید</option>
                        <?php
                        $model=new \application\model\User();
                        $permitions=$model->permition_list();
                        foreach ($permitions as $access) :
                            ?>
                            <option <?php if ($user_record->permition==$access->id){echo 'selected';} ?> value="<?php echo $access->id ?>"><?php echo $access->name ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="v20" class="form-label">وضعیت فعالیت</label>
                    <select id="v20" name="info[status]" class="form-select" >
                        <option selected>__انتخاب کنید</option>
                        <option value="active" <?php if ($user_record->status=='active'){echo 'selected';} ?>>فعال</option>
                        <option value="inactive" <?php if ($user_record->status=='inactive'){echo 'selected';} ?>>غیر فعال</option>

                    </select>
                </div>
            </div>
            <br>
            <h5>ارسال پیامک</h5>
            <hr>

            <div class="form-check">
                <input id="v21"  class="form-check-input" type="radio" >
                <label class="form-check-label" for="v21">
                    ارسال پیامک
                </label>

                <input id="v22"  class="form-check-input" type="radio"  checked>
                <label class="form-check-label" for="v22">
                    عدم ارسال پیامک
                </label>
            </div>
            <hr>
            <button name="update" type="submit" class="btn btn-primary">به روزرسانی</button>
            <button name="delete" type="submit" class="btn btn-primary">حذف</button>




        </form>

    </div>













<?php
$this->include('admin.layouts.footer');
?>