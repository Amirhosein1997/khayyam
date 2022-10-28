<?php
$this->include('admin.layouts.header');
?>
    <p class="title-form">افزودن مقاله جدید</p>
    <form class="my-form" method="post" enctype="multipart/form-data" action="<?php echo $this->url('article/store') ?>">
        <div class="row">
            <div class="col-md-9">


                <input class="form-control inputbig" type="text" name="title"placeholder="عنوان را اینجا وارد کنید">

                <br>
                <textarea class="form-control" name="text" id="body" aria-hidden="true" rows="12"></textarea>
                <br>

            </div>

            <div class="col-md-3">

                <div class="box-widget">
                    <h5>انتشار : </h5>
                    <button class="btn btn-primary" type="submit">
                        انتشار پست
                    </button>
                </div>


                <div class="box-widget">
                    <h5>دسته : </h5>
                    <?php
                        if (isset($categories)) :
                            foreach($categories as $category) :
                    ?>
                    <div class="custom-control custom-checkbox">
                        <div class="boxcheck">
                            <input name="cat[]" value="<?php echo $category->id; ?>" type="checkbox" class="custom-control-input" id="<?php echo $category->id; ?>">
                            <label class="custom-control-label" for="<?php echo $category->id; ?>"><?php echo $category->title; ?></label>
                        </div>
                    </div>
                    <?php
                                endforeach;
                                endif;
                                ?>

                </div>


                <div class="box-widget">
                    <h5>تصویر شاخص</h5>
                    <input type="file" name="thumbnail">
                </div>

            </div>

        </div>
    </form>
<?php
$this->include('admin.layouts.footer');
?>