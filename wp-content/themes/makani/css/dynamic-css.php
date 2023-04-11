<?php
global $makani_options;
$makani_body_color = $makani_options['makani_body-color'];
$makani_primary_color = $makani_options['makani_primary-color'];
$makani_secondary_color = $makani_options['makani_secondary-color'];
$makani_banner_image = $makani_options['makani_banner_image']['url'];
$makani_banner_single = $makani_options['makani_banner_single']['url'];

     if (!empty( $makani_banner_image)) { ?>
     <style>.parallax-archive{ background: url(<?php echo $makani_banner_image;?>) fixed center;}</style>   
    <?php  } else { ?>
     <style>.parallax-archive{ background: url(<?php bloginfo ('template_url'); ?>/img/banner-image.jpg) fixed center;}</style>   
    <?php } 
	
    if (!empty( $makani_banner_single)) { ?>
     <style>.parallax-single{ background: url(<?php echo $makani_banner_single;?>) fixed center;}</style>   
    <?php  } else { ?>
     <style>.parallax-single{ background: url(<?php bloginfo ('template_url'); ?>/img/banner-image.jpg) fixed center;}</style>    <?php } ?>
<style>
body {
  background:<?php echo $makani_body_color;?>!important; }

::selection { color: #FFF; background: <?php echo $makani_primary_color;?>; }

::-moz-selection { color: #FFF; background: <?php echo $makani_primary_color;?>; }

.btn-primary { background-color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }
.btn-primary:hover, .btn-primary:focus, .btn-primary:active { color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }

.loader:after { background-color: <?php echo $makani_primary_color;?>; }

.loader:before { border: 1px solid <?php echo $makani_primary_color;?>; }

.topheader ul.login-header li a:hover { color: #fff; background-color: <?php echo $makani_primary_color;?>; }

.modal-header { background: <?php echo $makani_primary_color;?>; }

.modal-open .modal, .modal-backdrop { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.nav-tabs li.active { border-bottom: 3px solid <?php echo $makani_primary_color;?>; }

.tab-content form .btn-secondary { background-color: <?php echo $makani_primary_color;?>; color: #fff; }
.tab-content form .btn-secondary:hover { background-color: <?php echo $makani_secondary_color;?>; }

#login-form input[type="submit"], #forgot-form input[type="submit"], #register input[type="submit"] { background-color: <?php echo $makani_primary_color;?>; color: #fff; }
#login-form input[type="submit"]:hover, #forgot-form input[type="submit"]:hover, #register input[type="submit"]:hover { background-color: <?php echo $makani_secondary_color;?>; }

.cd-logo h1 { color: <?php echo $makani_primary_color;?>; }
.cd-logo h1 a { color: <?php echo $makani_primary_color;?>; }
.cd-logo h2 { color: <?php echo $makani_secondary_color;?>; }

.cd-primary-nav .see-all a { color: <?php echo $makani_primary_color;?>; }

.cd-primary-nav > li > a { color: <?php echo $makani_primary_color;?>; }
.cd-primary-nav > li > a:hover { color: <?php echo $makani_secondary_color;?>; }
.cd-primary-nav > li > a.selected { color: <?php echo $makani_secondary_color;?>; box-shadow: inset 0 -2px 0 <?php echo $makani_secondary_color;?>; }

.cd-secondary-nav > li > a { color: <?php echo $makani_primary_color;?>; }
.cd-secondary-nav a:hover { color: <?php echo $makani_primary_color;?>; }

.cd-nav-gallery .cd-nav-item h3 { color: <?php echo $makani_primary_color;?>; }

.cd-search-trigger::before { border: 3px solid <?php echo $makani_primary_color;?>; }
.cd-search-trigger::after { background: <?php echo $makani_primary_color;?>; }
.cd-search-trigger span::before, .cd-search-trigger span::after { background: <?php echo $makani_primary_color;?>; }

.cd-primary-nav > .has-children > a::before, .cd-primary-nav > .has-children > a::after { background: <?php echo $makani_primary_color;?>; }

.has-children > a:hover::before, .has-children > a:hover::after, .go-back a:hover::before, .go-back a:hover::after { background: <?php echo $makani_primary_color;?>; }

.cd-overlay { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.hvr-underline-from-center:before { background: <?php echo $makani_secondary_color;?>; }

.hvr-overline-from-center:before { background: <?php echo $makani_secondary_color;?>; }

.overlay-transparent { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.services h3 { color: <?php echo $makani_primary_color;?>; }
.services .divider span:before, .services .divider span:after { background-color: <?php echo $makani_primary_color;?>; }
.services .servise-item:before { background: <?php echo $makani_secondary_color;?>; }
.services .servise-item h4 { color: <?php echo $makani_secondary_color;?>; }

.featured h3 { color: <?php echo $makani_primary_color;?>; }
.featured svg.cost-svg, .featured svg.stuts-svg, .featured svg.type-svg, .featured .draft-svg, .featured .bed-svg, .featured .bath-svg { fill: <?php echo $makani_secondary_color;?>; }
.featured .divider span:before, .featured .divider span:after { background-color: <?php echo $makani_primary_color;?>; }
.featured .card-block h5, .featured .card-block h5 a { color: <?php echo $makani_primary_color;?>; }
.featured .card-block h6, .featured .card-block h6 a { color: <?php echo $makani_secondary_color;?>; }

.card:hover .figure-effect figure, .card-noeffect .figure-effect:hover .figure-effect figure { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.card a:hover, .card a:focus { color: <?php echo $makani_primary_color;?>; }

.owl-prev { background-color: <?php echo $makani_primary_color;?>; }

.owl-next { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.btn-material { background: <?php echo $makani_primary_color;?>; }

#toTop { background: <?php echo $makani_secondary_color;?>; }

#toTop:hover { background: <?php echo $makani_primary_color;?>; }

.btn-more:active, .btn-more:hover { color: <?php echo $makani_primary_color;?>; }

.btn-more:before { color: <?php echo $makani_primary_color;?>; }

.parallax-overlay { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.mail-list input[type="submit"] { background-color: <?php echo $makani_secondary_color;?>; }
.mail-list input[type="submit"]:hover { background-color: <?php echo $makani_primary_color;?>; color: #FFF; }

.recently-offer h3 { color: <?php echo $makani_primary_color;?>; }
.recently-offer .divider span:before, .recently-offer .divider span:after { background-color: <?php echo $makani_primary_color;?>; }
.recently-offer .card h5, .recently-offer .card h5 a { color: <?php echo $makani_primary_color;?>; }
.recently-offer .card h6, .recently-offer .card h6 a { color: <?php echo $makani_primary_color;?>; }
.recently-offer .card .details h6, .recently-offer .card .details h6 a { color: <?php echo $makani_secondary_color;?>; }
.recently-offer .card svg.cost-svg, .recently-offer .card svg.stuts-svg, .recently-offer .card svg.type-svg, .recently-offer .card .draft-svg, .recently-offer .card .bed-svg, .recently-offer .card .bath-svg { fill: <?php echo $makani_secondary_color;?>; }

figure.effect-winston a:hover, figure.effect-winston a:focus { color: <?php echo $makani_primary_color;?>; }

.contact .contact-form button:hover { border: 1px solid <?php echo $makani_secondary_color;?>; color: <?php echo $makani_secondary_color;?>; }

.contact h3 { border-bottom: 3px solid <?php echo $makani_secondary_color;?>; color: <?php echo $makani_secondary_color;?>; }
.contact h3:before, .contact h3:after { background-color: <?php echo $makani_secondary_color;?>; }

.contact-phone p { color: <?php echo $makani_secondary_color;?>; }
.contact-phone i { color: <?php echo $makani_secondary_color;?>; }

.site-search-module-inside .btn-search { background-color: <?php echo $makani_primary_color;?>; border: 1px solid <?php echo $makani_primary_color;?>; }
.site-search-module-inside .btn-search:hover { color: <?php echo $makani_primary_color;?>; border: 1px solid <?php echo $makani_primary_color;?>; }
.site-search-module-inside .btn-advsearch { background-color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }
.site-search-module-inside .btn-advsearch:hover { color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }

.nstSlider .bar { background: <?php echo $makani_secondary_color;?>; }

h3.properties-title { background: <?php echo $makani_primary_color;?>; }

.properties-content:hover h3 a { background: <?php echo $makani_secondary_color;?>; }

.news h3 { color: <?php echo $makani_primary_color;?>; }
.news .divider span:before, .news .divider span:after { background-color: <?php echo $makani_primary_color;?>; }

.newblock:hover { background: <?php echo $makani_primary_color;?>; }

.partner h3 { color: <?php echo $makani_primary_color;?>; }
.partner .divider span:before, .partner .divider span:after { background-color: <?php echo $makani_primary_color;?>; }

footer h4 { color: <?php echo $makani_secondary_color;?>; }
footer .divider span:before, footer .divider span:after { background-color: <?php echo $makani_secondary_color;?>; }
footer ul li a:hover { color: <?php echo $makani_secondary_color;?>; }

div.pp_overlay { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); opacity: 0.6; }

.footer-logo h3 { color: <?php echo $makani_primary_color;?>; }

.aside-block h3 { color: <?php echo $makani_primary_color;?>; }
.aside-block .divider span:before, .aside-block .divider span:after { background-color: <?php echo $makani_primary_color;?>; }

.search-aside .btn-search { background-color: <?php echo $makani_primary_color;?>; border: 1px solid <?php echo $makani_primary_color;?>; }
.search-aside .btn-search:hover { color: <?php echo $makani_primary_color;?>; border: 1px solid <?php echo $makani_primary_color;?>; }
.search-aside .btn-advsearch { background-color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }
.search-aside .btn-advsearch:hover { color: <?php echo $makani_secondary_color;?>; border: 1px solid <?php echo $makani_secondary_color;?>; }

.contact-aside .header-contact i { background-color: <?php echo $makani_secondary_color;?>; }
.contact-aside form .btn { background-color: <?php echo $makani_primary_color;?>; }
.contact-aside form .btn:hover { background-color: <?php echo $makani_secondary_color;?>; }

.news-aside-block h4 a { color: <?php echo $makani_secondary_color;?>; }

.checkbox label:after { border: 3px solid <?php echo $makani_primary_color;?>; border-top: none; border-right: none; }

.meta-inner-wrapper span { color: <?php echo $makani_primary_color;?>; }

.cbp-vm-options { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.cbp-vm-view-grid .card h4 a, .cbp-vm-view-list .card h4 a { color: <?php echo $makani_primary_color;?>; }

.pagination > .current > a, .pagination > .active > a:focus, .pagination > .current > a:hover, .pagination > .current, .pagination > .current > span:focus, .pagination > .current:hover { background-color: <?php echo $makani_secondary_color;?>; border-color: <?php echo $makani_secondary_color;?>; color: #fff; }

.pagination > a:focus, .pagination > a:hover, .pagination > span:focus, .pagination > span:hover { color: <?php echo $makani_secondary_color;?>; }

.single-title { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

.related-post h3 { color: <?php echo $makani_primary_color;?>; }
.related-post .divider span:before, .related-post .divider span:after { background-color: <?php echo $makani_primary_color;?>; }

.related-post-block:hover { background: <?php echo $makani_primary_color;?>; }

.agent h3 { color: <?php echo $makani_primary_color;?>; }
.agent a.btn { background: <?php echo $makani_primary_color;?>; }
.agent a.btn:hover { background: <?php echo $makani_secondary_color;?>; }

.contact-info h3 { background: <?php echo $makani_primary_color;?>; }
.contact-info h3:hover { background: <?php echo $makani_secondary_color;?>; }

.page-error h3 { color: <?php echo $makani_primary_color;?>; }
.page-error h4 a { color: <?php echo $makani_secondary_color;?>; }
.page-error h4 a:hover { color: <?php echo $makani_primary_color;?>; }

h3#comments, #respond h3 { background: <?php echo $makani_primary_color;?>; background: -moz-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%, <?php echo $makani_primary_color;?>), color-stop(100%, <?php echo $makani_secondary_color;?>)); background: -webkit-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -o-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: -ms-linear-gradient(left, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); background: linear-gradient(to right, <?php echo $makani_primary_color;?> 0%, <?php echo $makani_secondary_color;?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $makani_primary_color;?>', endColorstr='<?php echo $makani_secondary_color;?>', GradientType=0 ); }

#commentform a { color: <?php echo $makani_primary_color;?>; }
#commentform a:hover { color: <?php echo $makani_secondary_color;?>; }

.reply a, .comment-navigation .newer a, .comment-navigation .older a, input#submit { background: <?php echo $makani_primary_color;?>; }

.comment-navigation .older a:hover, input#submit:hover { background: <?php echo $makani_secondary_color;?>; }

.comment-meta { color: <?php echo $makani_primary_color;?>; }

.remove-from-favorite { background: <?php echo $makani_primary_color;?>; }

.user-profile .form-option label { color: <?php echo $makani_primary_color;?>; }
.user-profile input[type="submit"] { background: <?php echo $makani_primary_color;?>; }
.user-profile input[type="submit"]:hover { background: <?php echo $makani_secondary_color;?>; }

.goto-address-button { background: <?php echo $makani_primary_color;?>; }

.goto-address-button:hover { background: <?php echo $makani_secondary_color;?>; }

.inputfile-1 + label { color: #fff; background: <?php echo $makani_primary_color;?>; }

.inputfile-1:focus + label, .inputfile-1.has-focus + label, .inputfile-1 + label:hover { background: <?php echo $makani_secondary_color;?>; }

button.btn { color: #fff; background: <?php echo $makani_primary_color;?>; }

button.btn:hover { background: <?php echo $makani_secondary_color;?>; }
</style>
