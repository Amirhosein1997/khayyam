<?php
$this->include('app.layouts.header');
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ورود به سایت</h1></div>
            <br><br><br>
            <div id="username_err" class="alert alert-danger" role="alert" style="display: none;">
               کاربرگرامی : نام کاربری اشتباه است !!
            </div>
            <div id="password_err" class="alert alert-danger" role="alert" style="display: none;">
                کاربرگرامی : رمزعبور اشتباه است !!
            </div>
            <div class="post-txt-single">
                <form method="post">
                    نام کاربری : <br>
                    <input type="text" name="username" class="form-control" required><br>
                    رمز عبور : <br>
                    <input type="text" name="password" class="form-control" required><br>

                    <br>
                    <hr>

                    <input type="submit" name="send" value="ورود" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>

<br>
<br>
<?php
$this->include('app.layouts.footer')
?>

