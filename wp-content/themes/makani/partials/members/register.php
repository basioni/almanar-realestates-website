<div class="form-wrapper">
    <div class="form-heading clearfix">
        <span>تسجيل عضو جديد</span>
    </div>

   <form id="register" class="ajax-auth"  action="register" method="post">
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <input id="signonname" type="text" name="signonname" class="form-control required" placeholder=" أسم المستخدم">
    <input id="email" type="text" class="form-control required email" name="email" placeholder="البريد الالكترونى">
    <input id="signonpassword" type="password" class="form-control required" name="signonpassword" placeholder="كلمة المرور" >
    <input type="password" id="password2" class="form-control required" name="password2" placeholder=" اعادة كلمة المرور">
    <input class="submit_button" type="submit" value="تسجيل">
     </form>

    <div class="clearfix register-footer">
        <span class="login-link pull-left">
            <a href="#" class="activate-section" data-section="login-section">تسجيل الدخول</a>
        </span>
        <span class="forgot-password pull-right">
            <a href="#" class="activate-section" data-section="password-section">نسيت كلمة المرور؟</a>
        </span>
    </div>

</div>

