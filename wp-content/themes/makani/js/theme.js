$('a.top').click(function(){
  $(document.body).animate({scrollTop : 0}, 800);
  return false;
});
//----------------------------- Strat LOADING--------------------------//
$(window).load(function() {
	//$("#loading").fadeOut(2000);
	$("#loading").delay(100).fadeOut("slow");
	 //------------addClass--------------------- 
	   $('#cd-primary-nav li').addClass('hvr-underline-from-center');
	   $('.footer-menu li').addClass('hvr-icon-forward');  
	   $('ul.sub-menu').addClass('cd-nav-icons is-hidden');
});
//----------------------------- UItoTop--------------------------//
(function($){
	$.fn.UItoTop = function(options) {
 		var defaults = {
    			text: '&#xf126;',
    			min: 200,
    			inDelay:600,
    			outDelay:400,
      			containerID: 'toTop',
    			containerHoverID: 'toTopHover',
    			scrollSpeed: 1200,
    			easingType: 'linear'
 		    },
            settings = $.extend(defaults, options),
            containerIDhash = '#' + settings.containerID,
            containerHoverIDHash = '#'+settings.containerHoverID;
		
		$('body').append('<a href="#" id="'+settings.containerID+'">'+settings.text+'</a>');
		$(containerIDhash).hide().on('click.UItoTop',function(){
			$('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 1
				}, 600, 'linear');
			}, function() { 
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 700, 'linear');
			});
					
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': sd + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) 
				$(containerIDhash).fadeIn(settings.inDelay);
			else 
				$(containerIDhash).fadeOut(settings.Outdelay);
		});
};
})(jQuery);


$(document).ready(function() {
	//-----------------------------input type="file"--------------------------// 
  jQuery('.uploadBtn').change(function(){  
			var newvalue = jQuery(this).attr('value'); 
			jQuery(this).prev().prev().attr('value',newvalue); 
		  });
		  
     jQuery('.chooseBtn').click(function(){
		   jQuery(this).next('.uploadBtn').click();
		 });
	//-----------------------------WOW--------------------------// 
	new WOW().init();
	//-----------------------------UItoTop--------------------------// 
	$().UItoTop({ easingType: 'easeOutQuart' });
	//-----------------------------prettyPhoto--------------------------// 
	   $("area[rel^='prettyPhoto']").prettyPhoto();
	   $(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:10000, autoplay_slideshow: true , hideflash: true});
	//-----------------------------niceScroll--------------------------//
	 $("body").niceScroll({zindex: 99999999, horizrailenabled:false , autohidemode:false , background:"#ccc", cursorfixedheight: 100, cursorcolor:"#1a1a1a" , cursorwidth :"10px" , cursorborder :"0px" , cursorborderradius :"0px"});
   //-----------------------------progress--------------------------//
   $(function() {
 	$('progress').each(function() {
    var max = $(this).val();
    $(this).val(0).animate({ value: max }, { duration: 3000, easing: 'easeOutCirc' });
		});
	});
	//-----------------------------Toggle--------------------------//
	$('#ads-trigger').click(function () {	
		if ($(this).hasClass('advanced')) {
			$(this).removeClass('advanced');
			$(".site-search-module").animate({
				'bottom': '-120px'
			});
			$(this).html('<i class="icon icon-FullScreen"></i> بحث متقدم');
			$('.slider-mask').fadeOut(500);
		} else {
			
			$(this).addClass('advanced');
			$(".site-search-module").animate({
				'bottom': '-10px'
			});
			$(this).html('<i class="icon icon-ExitFullScreen"></i> بحث متقدم');
			$('.slider-mask').fadeIn(500);
		}	
		return false;
	});
	//-----------------------------owl-demo--------------------------//
	//owl-demo-slider//
   var owl = $("#owl-demo-slider");
		owl.owlCarousel({
		navigation : true,
		singleItem:true,
		loop: true,
		nav:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true ,
		responsive:{0:{	items:1	},	600:{items:1},1000:{items:1}}
	  });
	//owl-demo-featured//  
	var owl = $("#owl-demo");
		owl.owlCarousel({
		navigation : true,
		items:3,
		loop: true,
		rtl:true,
		autoplay:true,
		stopOnHover : true,
		margin:24,
		nav:true,
		responsive:{0:{	items:1	},	750:{items:2},1000:{items:3}}
	  });
	  //owl-demo-partner//
	  var owl = $("#owl-demo-partner");
		owl.owlCarousel({
		navigation : false,
		nav:false,
		items:5,
		loop: true,
		rtl:true,
		autoplay:true,
		stopOnHover : true,
		responsive:{0:{	items:1	},	750:{items:3},1000:{items:5}}
	  });
	  //owl-featured-aside//
	  var owl = $("#owl-featured-aside");
		owl.owlCarousel({
		items:1,
		loop: true,
		rtl:true,
		autoplay:true,
		stopOnHover : true,
		nav:true,
	  });
	  //owl-single//
      var owl = $("#owl-single");
		owl.owlCarousel({
		items:1,
		loop: true,
		rtl:true,
		autoplay:true,
		stopOnHover : true,
		navigation : false,
		nav:false,
	  });
    //-----------------------------masonry--------------------------//
	var $container = $('.masonry-wrapper');
	$container.masonry({itemSelector: '.item-masonry'});
	
	//------------paralax------------------------------------------//
	 $window = $(window);
	   $('section[data-type="background"]').each(function(){
		 var $bgobj = $(this); 
		  $(window).scroll(function() {
			var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
			var coords = '50% '+ yPos + 'px';
			$bgobj.css({ backgroundPosition: coords });
	  }); 
	 });
	 //-----------------------------color-switcher--------------------------// 
	 $('#demo-wrapper ul li, #demo-wrapper p').click(function(){
				 var color_scheme = $(this).attr('data-path');
				 $('#color-switcher').attr('href',color_scheme);
	   });
	   
	   $('#open-switcher').click(function(){
				 $('#open-switcher').css("display","none");
				 $('#demo-colors').animate({ 'left': '0px' }, 200, 'linear', function(){
						   $('#close-switcher').fadeIn(200);
				 });
	   });
	   
	   $('#close-switcher').click(function(){
				 $('#close-switcher').css("display","none");
				 $('#demo-colors').animate({ 'left': '-202px' }, 200, 'linear', function(){
						   $('#open-switcher').fadeIn(200);
				 });
	   });
	    //------------social-media---------------------//
	  $('.social-media').find('li').each(function() {
			var $this = $(this),
				$a = $this.find('a'),
				$aFirst = $a.first();
			$a.addClass('regular').clone().removeClass('regular').addClass('hover').appendTo($this);
			$this.hover(function() {
				$(this).find('a.regular').stop(true, true).animate({'top':'-40px'}, 200);
				$(this).find('a.hover').stop(true, true).animate({'top':'0px'}, 200);
			}, function() {
				$(this).find('a.regular').stop(true, true).animate({'top':'0px'}, 200);
				$(this).find('a.hover').stop(true, true).animate({'top':'40px'}, 200);
			});
		}); 
		$('.social-agent').find('li').each(function() {
			var $this = $(this),
				$a = $this.find('a'),
				$aFirst = $a.first();
			$a.addClass('regular').clone().removeClass('regular').addClass('hover').appendTo($this);
			$this.hover(function() {
				$(this).find('a.regular').stop(true, true).animate({'top':'-32px'}, 200);
				$(this).find('a.hover').stop(true, true).animate({'top':'0px'}, 200);
			}, function() {
				$(this).find('a.regular').stop(true, true).animate({'top':'0px'}, 200);
				$(this).find('a.hover').stop(true, true).animate({'top':'32px'}, 200);
			});
		});    
});
//-----------------------------Sticky Menu Effect--------------------------// 
$ = (jQuery);
(function($) {
$.fn.getHiddenDimensions = function(includeMargin) {
    var $item = this,
        props = { position: 'absolute', visibility: 'hidden', display: 'block' },
        dim = { width:0, height:0, innerWidth: 0, innerHeight: 0,outerWidth: 0,outerHeight: 0 },
        $hiddenParents = $item.parents().andSelf().not(':visible'),
        includeMargin = (includeMargin == null)? false : includeMargin;

    var oldProps = [];
    $hiddenParents.each(function() {
        var old = {};
        for ( var name in props ) {
            old[ name ] = this.style[ name ];
            this.style[ name ] = props[ name ];
        }
        oldProps.push(old);
    });

    dim.width = $item.width();
    dim.outerWidth = $item.outerWidth(includeMargin);
    dim.innerWidth = $item.innerWidth();
    dim.height = $item.height();
    dim.innerHeight = $item.innerHeight();
    dim.outerHeight = $item.outerHeight(includeMargin);

    $hiddenParents.each(function(i) {
        var old = oldProps[i];
        for ( var name in props ) {
            this.style[ name ] = old[ name ];
        }
    });
    return dim;
}
}(jQuery));

jQuery(document).ready(function(){
			
	var newHeight = Math.floor(jQuery('.header_container').height())-1;
	var menuHeight = jQuery('#menulava').height()-3;

	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 10){
		    //make CSS changes here
		    jQuery('.header_container').addClass("n-hc");
			jQuery('.logo_and_menu').addClass("n-ma");							
		    
		    if (jQuery('#headerStyleType').html() !== "style1"){
		    	jQuery('.fullwidth_container').not('.fullwidth_container_menu').slideUp(500, "easeOutExpo");
		    }
		    				    
		} else {
		    //back to default styles
		    jQuery('.header_container').removeClass("n-hc");
			jQuery('.logo_and_menu').removeClass("n-ma");							
		    
		    if (jQuery('#headerStyleType').html() !== "style1"){
		    	jQuery('.fullwidth_container').not('.fullwidth_container_menu').slideDown(500);
		    }
		    
		    if (jQuery('body > .fullwidth-section').length){
				jQuery('body > .fullwidth-section').each(function(){
					var thisClass = jQuery(this).attr('class');
						thisClass = thisClass.split('fullwidth-section ');	
						thisClass = thisClass[1];
					jQuery('body > .'+thisClass).css({'top': jQuery('.'+thisClass).eq(1).offset().top, 'position':'absolute', 'margin-bottom':'50px'});
			    });
		    }
		}
	});
	
});

function isScrolledIntoView(id){
    var elem = "#" + id;
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    if ($(elem).length > 0){
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    }
    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
      && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
}
