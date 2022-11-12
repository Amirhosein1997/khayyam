<?php
$this->include('app.layouts.header');
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="post-single">
                <div class="post-title-single"><h1><?php echo $article_record->title; ?></h1>
                    <div class="clearfix"></div>
                    <div class="entry-meta">
                        <div class="view">
                            دسته بندی :
                            <ul class="post-categories">
                                <li><a href="" rel="category tag"><?php echo $article_record->cat_id; ?></a></li>
                            </ul>
                        </div>

                        <div class="view"><i class="fa fa-comment"></i>
                            منتشر شده در :
                            <?php echo $article_record->date; ?>
                        </div>
                        <div class="view"><i class="fa fa-user"></i><span> نویسنده :
                            <?php echo $article_record->author; ?>
                            </span>
                        </div>
                        <div class="view"><i class="fa fa-user"></i><span> آیدی مقاله :
                            <?php echo $article_record->id; ?>
                            </span>
                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>
                <div class="thumb-single-product"><img src="<?php echo $article_record->img; ?>" class="attachment-medium size-medium wp-post-image" alt=""></div>

                <div class="post-txt-single">
                    <p>

                        <?php echo $article_record->text; ?>


                    </p>
                </div>
            </div>

            <div class="box-comment">
                <h3>نظر خود را در رابطه با این مقاله وارد کنید</h3>
                <h3>برای ثبت نظر ابتدا باید
                    <a class="btn btn-warning" href="<?php $this->url('user/login'); ?>">وارد شوید</a>
                    یا
                    <a class="btn btn-primary" href="<?php $this->url('user/register'); ?>"> ثبت نام کنید </a>
                    کنید
                </h3>




                <div class="comment">
                    <img src="img/user.png">
                    <h5>رضاحیدری</h5>
                    <p>متن کامنت</p>
                </div>


                <div class="clearfix"></div>
                <br>
                <br>
                <form action="/comment-post" method="post">
                    <span>متن نظر شما</span>
                    <textarea name="text"></textarea>
                    <input type="hidden" name="article_id" value="{{$single->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                    <input type="submit" class="btn btn-success" value="ثبت نظر">
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>


<?php
$this->include('app.layouts.footer')
?>
