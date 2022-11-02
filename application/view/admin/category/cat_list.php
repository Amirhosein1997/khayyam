<?php
$this->include('admin.layouts.header');
?>






    <!DOCTYPE html>
    <head>
        <title>مشاهده دسته بندی ها</title>
    </head>
    <a class="btn btn-primary" href="<?php $this->url('category/cat_menu/new_cat'); ?>" role="button">افزودن دسته جدید</a>
    <div class="alert alert-dark" role="alert">
        تعداد گروه های اصلی:<?php
        $model=new \application\model\Category();
        echo count($model->cat_list());
        ?>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">عنوان</th>
            <th scope="col">ترتیب</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $list_cat=$model->cat_list();
        foreach ($list_cat as $key=>$cat):
            ?>
            <tr>
                <td><?php echo $cat->title; ?></td>
                <td><?php echo $cat->sort; ?></td>
                <td><?php echo $cat->status; ?></td>
                <td><a class="btn btn-primary" href="<?php $this->url('category/edit_cat/'.$cat->id); ?>" role="button">ویرایش</a></td>
                <td><a class="btn btn-primary" href="<?php $this->url('category/delete_cat/'.$cat->id); ?>" role="button">حذف</a></td>
            </tr>
            <?php
            $list_subcat=$model->sub_cat($cat->id);
            foreach ($list_subcat as $subcat):

                ?>
                <tr>

                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-left-square-fill" viewBox="0 0 16 16">
                            <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm8.096-10.803L6 9.293V6.525a.5.5 0 0 0-1 0V10.5a.5.5 0 0 0 .5.5h3.975a.5.5 0 0 0 0-1H6.707l4.096-4.096a.5.5 0 1 0-.707-.707z"/>
                        </svg>
                        <?php echo $subcat->title; ?>
                    </td>
                    <td><?php echo $subcat->sort; ?></td>
                    <td><?php echo $subcat->status; ?></td>
                    <td><a class="btn btn-primary" href="<?php $this->url('category/edit_cat/'.$subcat->id); ?>" role="button">ویرایش</a></td>
                    <td><a class="btn btn-primary" href="<?php $this->url('category/delete_cat/'.$cat->id); ?>" role="button">حذف</a></td>

                </tr>



            <?php
            endforeach;
            ?>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>



















<?php
$this->include('admin.layouts.footer');
?>
