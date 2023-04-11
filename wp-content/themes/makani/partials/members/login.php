<div class="form-wrapper">
    <div class="form-heading clearfix">
        <span>تسجيل الدخول</span>
    </div>
    <form id="login-form" action="<?php echo wp_login_url(); ?>" method="post" enctype="multipart/form-data">
        <div class="register-content">
            <input id="login-username" name="log" type="text" class="form-control required"
                   title="<?php _e( '* Please enter a valid username.', 'makani' ); ?>"
                   placeholder="أسم المستخدم" />
        
            <input id="password" name="pwd" type="password" class="form-control required"
                   placeholder="كلمة المرور" />
       
            <input type="submit" class="btn btn-secondary" value="تسجيل الدخول" />
            <input type="hidden" name="user-cookie" value="1" />
            <?php
            if( is_singular( 'property' ) ){
                ?><input type="hidden" name="redirect_to" value="<?php wp_reset_postdata(); global $post; the_permalink( $post->ID ); ?>" /><?php
            }else{
                ?><input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/' ) ); ?>" /><?php
            }
            ?>
        </div>
    </form>

    <div class="clearfix register-footer">
        <?php
        if( get_option( 'users_can_register' ) ) :
            ?>
            <span class="sign-up pull-left">لست مشترك ؟
                <a href="#" class="activate-section" data-section="register-section">تسجيل عضو جديد</a>
            </span>
            <?php
        endif;
        ?>
        <span class="forgot-password pull-right">
            <a href="#" class="activate-section" data-section="password-section">نسيت كلمة المرور؟</a>
        </span>
    </div>

</div>
