<?php
$this->include('admin.layouts.header');
?>


    <!DOCTYPE html>
    <head>
        <title>تنظیمات کاربران</title>
    </head>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">تنطیمات کاربران</h4>
                راهنمای پنل!!!!!!!!
    </div>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_update'):?>
        <div class="alert alert-primary" role="alert">
            ویرایش گروه صفحه انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_register_bulk_users'):?>
        <div class="alert alert-primary" role="alert">
            پیکربندی گروهی صفحه انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_register_user'):?>
        <div class="alert alert-primary" role="alert">
            پیکربندی کاربر جدید با موفقیت انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_delete'):?>
        <div class="alert alert-primary" role="alert">
            حذف گروه صفحه انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_made_page'):?>
        <div class="alert alert-primary" role="alert">
            ایجاد صفحه جدید انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_update_page'):?>
        <div class="alert alert-primary" role="alert">
            ویرایش انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_GET['op'])):
    if ($_GET['op']=='ok_delete_page'):?>
        <div class="alert alert-primary" role="alert">
            حذف صفحه انجام شد.
        </div>
    <?php endif; ?>
<?php endif; ?>

    <hr>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    پیکربندی کاربر جدید
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?php // include_once 'made_user.php' ?>
                    <?php $this->include('admin/user/made_user'); ?>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    پیکربندی گروهی کاربران
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?php $this->include('admin/user/made_groupe_user');?>
                    <br><br><hr>
                    <h6 style="text-align: center;padding:20px;background-color: #5a6268">گزارش تاریخچه ارسال فایل</h6>
                    <?php $this->include('admin/user/list_upload_file');?>
                </div>
            </div>
        </div>

    </div>

<?php
$this->include('admin.layouts.footer');
?>