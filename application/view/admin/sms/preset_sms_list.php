
<head>
    <title>
        لیست پیامک های پیش فرض
    </title>
</head>

<div class="container mt-3">
    <h5>لیست پیامک های ایجاد شده</h5>
    <br>

    <table  class="table table-dark table-hover">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>متن</th>
            <th>گروه</th>
            <th>نویسنده</th>
            <th>تاریخ</th>
            <th>وضعیت</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $sms_model=new \application\model\Sms();

        $preset_sms_records=$sms_model->select_preset_sms();
        foreach ($preset_sms_records as $key=>$val):
        ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $val->text; ?></td>
            <td><?php echo $val->cat; ?></td>
            <td><?php echo $val->author; ?></td>
            <td><?php echo $val->date; ?></td>
            <td>
                <?php if ($val->status=='on'): ?>
                    <button type="button" class="btn btn-success">فعال</button>
                <?php elseif ($val->status=='off'):?>
                <button type="button" class="btn btn-danger">غیره فعال</button>
                <?php endif;?>
            </td>
            <td> <a href="<?php $this->url('Sms/edit_preset/'.$val->id); ?>" class="btn btn-warning">ویرایش</a></td>
            <td> <a href="<?php $this->url('Sms/delete_preset/'.$val->id); ?>" class="btn btn-dark">حذف</a></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>