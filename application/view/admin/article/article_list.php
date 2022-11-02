<?php
$this->include('admin.layouts.header');
$article_model=new \application\model\Article();
?>







    <!DOCTYPE html>
    <head>
        <title>مشاهده مقالات</title>
    </head>

    <a class="btn btn-primary" href="dashboard.php?page=new-article" role="button">افزودن نوشته جدید</a>
    <div style="text-align: center" class="alert alert-primary" role="alert">
        تعداد مقالات: <?php echo count($article_model->select_articles()); ?>
    </div>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-sm table-dark table-hover" >
            <thead>
            <tr>
                <th scope="col"><input type="checkbox" id="select-all"></th>
                <th scope="col">ردیف</th>
                <th scope="col">کد محتوا</th>
                <th scope="col">عنوان نوشته</th>
                <th scope="col">محتوای نوشته</th>
                <th scope="col">دسته بندی</th>
                <th scope="col">وضعیت انتشار</th>
                <th scope="col">نویسنده</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">تصویر</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $articles=$article_model->select_articles();
            foreach ($articles as $key=>$article): ?>
                <tr>
                    <td><input class="form-check-input" type="checkbox"  name="check[]" value="<?php echo $article->id; ?>" ></td>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $article->code_article; ?></td>
                    <td><?php echo $article->title; ?></td>
                    <td><?php if(strlen($article->text) > 10){$article->text = substr($article->text, 0, 10) . '...';echo $article->text;}else{echo $article->text;} ?></td>
                    <td><?php $cats_names=explode(',',$article->cat_id);
                        foreach ($cats_names as $item){
                            echo $item;
                            echo '<br>';

                        }
                        ?></td>
                    <td><?php echo $article->status; ?></td>
                    <td><?php echo $article->author; ?></td>
                    <td><?php echo $article->date; ?></td>
                    <td><img src="<?php $this->url($article->img); ?>" width="100" height="60"></td>
                    <td><a class="btn btn-primary" href="<?php $this->url('article/edit_article_page/'.$article->id); ?>" role="button">ویرایش</a></td>
                    <td><a class="btn btn-primary" href="<?php $this->url('article/delete_article/'.$article->id); ?>" role="button">حذف</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>

        </table>

    </form>



























<?php
$this->include('admin.layouts.footer');
?>