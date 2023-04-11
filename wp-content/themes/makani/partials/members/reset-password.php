<div class="form-wrapper">
    <div class="form-heading clearfix">
        <span>أستعادة كلمة المرور</span>
    </div>

    <form id="forgot-form" action="<?php echo wp_lostpassword_url(); ?>" method="post">
        <div class="register-content">
          <input id="password-reset" name="user_login" type="text" class="form-control email required"
                   title=" Please provide username or email!"
                   placeholder="اسم المستخدم او البريد الالكترونى" />

            <input type="hidden" name="user-cookie" value="1" />
            <input type="submit" name="user-submit" class="btn btn-secondary"
                   value="أستعادة كلمة المرور">
        </div>
    </form>

    <div class="clearfix register-footer">
        <?php
        if( get_option( 'users_can_register' ) ) :
            ?>
            <span class="sign-up pull-left">
                لست مشترك ؟
                <a href="#" class="activate-section" data-section="register-section">تسجيل عضو جديد</a>
            </span>
        <?php
        endif;
        ?>
        <span class="login-link pull-right">
            <a href="#" class="activate-section" data-section="login-section">نسيت كلمة المرور؟</a>
        </span>

    </div>

</div>

