<?php
$this->include('admin.layouts.header');
?>










<!DOCTYPE html>
<head>
    <title>مشاهده همه ابزارک ها</title>
</head>
<?php
    $widget_model=new \application\model\Widget();
    $widget_records=$widget_model->all_widget();
    ?>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">عنوان</th>
            <th scope="col">ترتیب</th>
            <th scope="col">تصویر ابزارک</th>
            <th scope="col">کاربر نویسنده</th>
            <th scope="col">تاریخ</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($widget_records as $key=>$record):
            ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $record->title; ?></td>
                <td><?php echo $record->sort; ?></td>
                <td><?php echo $record->svg_code; ?></td>
                <td><?php echo $record->author; ?></td>
                <td><?php echo $record->date; ?></td>
                <td><?php echo $record->status; ?></td>
                <td><a class="btn btn-primary" href="<?php $this->url('widget/edit_widget/'.$record->id); ?>" role="button">ویرایش</a></td>
                <td><a class="btn btn-primary" href="<?php $this->url('widget/delete_widget/'.$record->id); ?>" role="button">حذف</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


































<?php
$this->include('admin.layouts.footer');
?>
