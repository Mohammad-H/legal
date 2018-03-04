<div class="mainlr">
    <form action="adminregister/register" method="post" id="form">
        <span class="title">اطلاعات ثبت نام</span>
        <!--نام:-->
        <input class="input" type="text" name="name" required autofocus placeholder="نام"/>
        <!--نام خانوادگی:<br/>-->
        <input class="input" type="text" name="last-name" required autocomplete="off" placeholder="نام خانوادگی"/>
        <!--ایمیل:<br/>-->
        <input class="input" type="email" name="email" required autocomplete="off" placeholder="ایمیل"/>
        <!--رمزعبور:<br/>-->
        <input class="input" type="password" name="password" required autocomplete="off" placeholder="رمزعبور"/>
        <label for="access">نقش : </label>
        <select name="access" id="access">
            <option value="1">مدیر اصلی</option>
            <option value="2">کارمند</option>
        </select>
        <br/>
        <br/>
        <input class="button" type="submit" name="sumbit" value="عضویت"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="action" href="adminlogin/">ورود</a>
    </form>
</div>