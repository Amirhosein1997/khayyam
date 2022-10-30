

<!DOCTYPE html>
<head>
    <title>مشاهده لیست مجوزها</title>
</head>



<div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">کد مجوز</th>
            <th scope="col">عنوان مجوز/سمت</th>
            <th scope="col">ایجاد کننده</th>
            <th scope="col">تاریخ</th>
            <th scope="col">مجوزها</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $access=$this->perm_list();
        if (count($access)==0): ?>

            <div class="alert alert-primary" role="alert">
                بدون هیچ مجوز دسترسی.
            </div>

        <?php endif;?>
<?php foreach ($access as $index=>$val):
    ?>
        <tr>
            <td><?php echo $index+1; ?></td>
            <td><?php echo $val->code; ?></td>
            <td><?php echo $val->name; ?></td>
            <td><?php echo $val->author; ?></td>
            <td><?php echo $val->date; ?></td>
            <td>
            <?php $result=explode(',',$val->permition);
            foreach ($result as $key=>$result_names):?>
                <?php echo $result_names   ?>
                <?php endforeach;?>

            </td>
            <td><?php echo $val->status; ?></td>
            <td><button type="button" class="btn btn-primary"><a href="<?php $this->url('user/edit_perm/'.$val->id); ?>">ویرایش</a></button></td>
            <td><button type="button" class="btn btn-primary"><a href="<?php $this->url('user/delete_access/'.$val->id); ?>">حذف</a></button></td>
        </tr>
<?php endforeach;?>
             </tbody>
    </table>




</div>
