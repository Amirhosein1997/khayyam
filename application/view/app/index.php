
<?php
$this->include('app.layouts.header');
?>
<?php
/*if(isset($users)){
    foreach ($users as $user){
        echo $user->username."<br>";
    }
}*/
?>


<div class="main">
    <div class="main-slider">
        <div class="owl-carousel owl-theme">
            <?php $slider_model=new \application\model\Slider();
            $slides=$slider_model->select_on_slider();

            foreach ($slides as $slide):
                $exploded_loc=explode('/',$slide->dir);
                $mod_loc='/'.$exploded_loc[3].'/'.$exploded_loc[4].'/'.$exploded_loc[5].'/'.$exploded_loc[6].'/'.$exploded_loc[7].'/'.$exploded_loc[8];

                ?>
            <div class="item">
                <a target="_blank" href="#"><img src="<?php echo $mod_loc; ?>" alt="bootstrap course"/></a>
                <span><a href="#">بهترین زبان برنامه نویسی برای طراحی وبسایت</a> </span>
            </div>
            <?php  endforeach; ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $widget_model=new \application\model\Widget();
            $widgets=$widget_model->all_on_widget();
            foreach ($widgets as $widget):
            ?>
            <div class="col-md-2 widget">
                <svg class="bi bi-film" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M0 1a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H1a1 1 0 01-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"
                          clip-rule="evenodd"></path>
                </svg>
                <span><?php echo $widget->title; ?></span>
            </div>

            <?php endforeach;?>

        </div>
    </div>
</div>

<br>
<br>
<?php $page_model=new \application\model\Page();
$single_page=$page_model->select_single_page();
$exploded_btn=explode(',',$single_page->btn_title);
$exploded_link=explode(',',$single_page->page_link);
?>
<div class="container-fluid post-tak">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 video-box">
                    <?php echo $single_page->video_code; ?>
                </div>
                <div class="col-md-7 content-box">
                    <h3><?php echo $single_page->title; ?></h3>
                    <p><?php echo $single_page->description; ?></p>
                    <div class="link-single">
                        <a href="<?php echo $exploded_link[0]; ?>" class="login"><?php echo $exploded_btn[0]; ?></a>
                        <a href="<?php echo $exploded_link[1]; ?>" class="sabtnam"><?php echo $exploded_btn[1]; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="title-main">
    <h4>آخرین مطالب آموزشی</h4>
</div>
<?php $article_model=new \application\model\Article();
$articles=$article_model->select_articles();
?>

<div class="container-fluid post-container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <?php foreach ($articles as $article): ?>
                <article class="post">
                    <div class="thumb">
                        <img src="<?php echo $article->img; ?>" width="100" height="50">
                    </div>
                    <div class="post-title">
                        <h2><a target="_blank" href="<?php $this->url('User/article_page/'.$article->id); ?>" dideo-checked="true"><?php echo $article->title; ?></a></h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="post-txt">
                        <h4> <?php echo $article->text; ?></h4>
                    </div>
                    <div class="post-foot-container">
                        <div class="line-border"></div>
                        <div class="p-c-view"><i class="fa fa-eye"></i><?php echo $article->date; ?></div>
                        <div class="p-c-comment"><i class="fa fa-comment"></i></div>
                        <div class="p-c-view"><i class="fa fa-comment"></i><?php echo $article->author; ?></div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<?php
$this->include('app.layouts.footer')
?>


