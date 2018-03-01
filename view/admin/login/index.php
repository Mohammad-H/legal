<div class="mainlr">
    <form action="adminlogin/checkuser" method="post" id="form">
        <span class="title">اطلاعات ورود</span><br>
        <?php

        if(isset($_GET['register-ok'])){echo "<div style='color: #00ba00;'>ثبت نام موفق،میتوانید وارد شوید</div>";}
        elseif (isset($_GET['error-email-pass'])) {
            echo "<span class=error>ایمیل یا رمز عبور اشتباه میباشد</span>";
        } elseif (isset($_GET['empty-email-pass'])) {
            echo "<span class=error>ایمیل و رمز عبور را وارد نمایید</span>";
        }
        ?>
        <!--نام کاربری:-->
        <input class="input" type="email" name="email" required autofocus placeholder="ایمیل"/>
        <!--رمز عبور:<br/>-->
        <input class="input" type="password" name="password" required autocomplete="off" placeholder="رمز عبور"/>
        <br/>
        <input class="button" type="submit" name="sumbit" value="ورود"/>
<!--        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="action" href="register.php">عضویت</a>-->
    </form>
</div>