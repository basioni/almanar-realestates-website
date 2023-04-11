<?php 
get_header();
global $makani_options;
?>

   <section class="header-breadcrumb parallax-single" data-type="background" data-speed="3">
     <div class="parallax-overlay"></div>
        <div class="breadcrumb">
            <div class="container">
            <h3>
			<?php if(function_exists('breadcrumbs')) : ?>
			<?php breadcrumbs() ?>
            <?php endif; ?>
            </h3>
            </div>
        </div>
    </section>

   <section class="content-pages cd-main-content">  
       <div class="container">
         <div class="row">
             <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="card-noeffect page-error">
                     <h3>هذة الصفحة غير موجودة </h3>
                     <h4><a href="<?php echo esc_url( home_url('/') ); ?>">العودة للرئيسية</a></h4>
                 </div> 
             </div><!-- col-md-8 col-xs-12 -->
             
             <aside class="col-lg-4 col-md-12 col-xs-12">
                <?php if ( is_active_sidebar( 'default-page-sidebar' ) ) {
                dynamic_sidebar( 'default-page-sidebar' );
                } ?>
             </aside>
         </div><!-- row -->  
     </div><!-- container --> 
	</section>  

<?php get_footer(); ?>




                                   

                             