(function ($) {
 "use strict";
 
/*----------------------------
 Data-Toggle Tooltip
------------------------------ */	

$('[data-toggle="tooltip"]').tooltip();
 
 /*----------------------------
 wow js active
------------------------------ */
 new WOW().init();
 
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#mobile-menu').meanmenu();

/*----------------------------
 jQuery MeanMenu
------------------------------ */
	$('.dropdown-toggle').dropdown()

//---------------------------------------------
//Nivo slider
//---------------------------------------------
	$('#ensign-nivoslider').nivoSlider({
		autoplay: true,
		slices: 15,
		animSpeed: 500,
		pauseTime: 5000,
		directionNav: true,
		pauseOnHover: false,
	});
	 
 /*----------------------------
 Active-Hot-Deals
------------------------------ */  
  $(".active-hot-deals").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Bestseller
------------------------------ */  
  $(".active-bestseller").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Sidebar-Banner
------------------------------ */  
  $(".active-sidebar-banner").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:false,	  
      items : 1,
	  transitionStyle : "fade",
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Recent-Posts
------------------------------ */  
  $(".active-recent-posts").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Product-Carosel
------------------------------ */   
  $(".active-product-carosel").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,3],
	  itemsTablet: [991,2],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],	  
  });
  
 /*----------------------------
 Active-Small-Product
------------------------------ */   
  $(".active-small-product").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 3,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,2],
	  itemsTablet: [991,2],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],	
  });

 /*----------------------------
 Active-Brand-Logo
------------------------------ */   
  $(".active-brand-logo").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 6,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,5],
	  itemsTablet: [991,4],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Hot-Deals-Style-2
------------------------------ */  
  $(".active-hot-deals-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:false,	  
      items : 5,
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Product-Carosel-style-2
------------------------------ */   
  $(".active-product-carosel-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 5,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 	Active-Recent-Posts-style-2
------------------------------  */  
  $(".active-recent-posts-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });


/*--------------------------
	Category Menu
---------------------------- */	
	 $('.rx-parent').on('click', function(){
		$('.rx-child').slideToggle();
		$(this).toggleClass('rx-change');
		
	});

	$(".embed-responsive iframe").addClass("embed-responsive-item");
	$(".carousel-inner .item:first-child").addClass("active");
	
/*--------------------------
	category left menu
---------------------------- */	
	 $('.category-heading').on('click', function(){
	 $('.category-menu-list').slideToggle(300);
	});	  


/*---------------------
 countdown
--------------------- */
	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
	  });
	});	


/*---------------------
 price slider
--------------------- */  
		
	

$(document).ready(function() {

var hidde = false;

(function ($) {
 "use strict";
 
/*----------------------------
 Data-Toggle Tooltip
------------------------------ */	

$('[data-toggle="tooltip"]').tooltip();
 
 /*----------------------------
 wow js active
------------------------------ */
 new WOW().init();
 
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#mobile-menu').meanmenu();

/*----------------------------
 jQuery MeanMenu
------------------------------ */
	$('.dropdown-toggle').dropdown()

//---------------------------------------------
//Nivo slider
//---------------------------------------------
	$('#ensign-nivoslider').nivoSlider({
		autoplay: true,
		slices: 15,
		animSpeed: 500,
		pauseTime: 5000,
		directionNav: true,
		pauseOnHover: false,
	});
	 
 /*----------------------------
 Active-Hot-Deals
------------------------------ */  
  $(".active-hot-deals").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Bestseller
------------------------------ */  
  $(".active-bestseller").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Sidebar-Banner
------------------------------ */  
  $(".active-sidebar-banner").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:false,	  
      items : 1,
	  transitionStyle : "fade",
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

/*----------------------------
 Active-Recent-Posts
------------------------------ */  
  $(".active-recent-posts").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  itemsDesktop : [1169,1],
	  itemsTablet: [991,1],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Product-Carosel
------------------------------ */   
  $(".active-product-carosel").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,3],
	  itemsTablet: [991,2],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],	  
  });
  
 /*----------------------------
 Active-Small-Product
------------------------------ */   
  $(".active-small-product").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 3,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,2],
	  itemsTablet: [991,2],
	  itemsTabletSmall: [767,1],
	  itemsMobile : [479,1],	
  });

 /*----------------------------
 Active-Brand-Logo
------------------------------ */   
  $(".active-brand-logo").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 6,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,5],
	  itemsTablet: [991,4],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Hot-Deals-Style-2
------------------------------ */  
  $(".active-hot-deals-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:false,	  
      items : 5,
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Active-Product-Carosel-style-2
------------------------------ */   
  $(".active-product-carosel-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 5,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 	Active-Recent-Posts-style-2
------------------------------  */  
  $(".active-recent-posts-style-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1169,4],
	  itemsTablet: [991,3],
	  itemsTabletSmall: [767,2],
	  itemsMobile : [479,1],
  });


/*--------------------------
	Category Menu
---------------------------- */	
	 $('.rx-parent').on('click', function(){
		$('.rx-child').slideToggle();
		$(this).toggleClass('rx-change');
		
	});

	$(".embed-responsive iframe").addClass("embed-responsive-item");
	$(".carousel-inner .item:first-child").addClass("active");
	
/*--------------------------
	category left menu
---------------------------- */	
	 $('.category-heading').on('click', function(){
	 $('.category-menu-list').slideToggle(300);
	});	  


/*---------------------
 countdown
--------------------- */
	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
	  });
	});	


/*---------------------
 price slider
--------------------- */  
		
	

$(document).ready(function() {

var hidde = false;
		
		if(Cookies.get('side') == '0') {
		$('.col-md-3.side').hide();
		

			$('.col-md-9.content').addClass('col-md-12');
			$('.col-md-12.content').removeClass('col-md-9');
			$(this).css({'transform': 'rotate(180deg)'});
			$("#ensign-nivoslider .nivo-nextNav").trigger('click');
		
		$('.toggle-siebar').css({'transform': 'rotate(180deg)'});
				hidde = true;
		}
$('.toggle-siebar').click(function() {
	if(!hidde) {
		Cookies.set('side', '0');
		$('.col-md-3.side').animate({right:100, position: "relative", opacity:"hide"}, 800);
		
		setTimeout(function() {
			$('.col-md-9.content').addClass('col-md-12');
			$('.col-md-12.content').removeClass('col-md-9');
			$(this).css({'transform': 'rotate(180deg)'});
			$("#ensign-nivoslider .nivo-nextNav").trigger('click');
		}, 850);
		$(this).css({'transform': 'rotate(180deg)'});
		hidde = true;
	} else {
		$('.col-md-3.side').animate({right:0, position: "relative", opacity:"show"}, 800);
		Cookies.set('side', '1');
			$('.col-md-12.content').addClass('col-md-9');
			$('.col-md-9.content').removeClass('col-md-12');
			$(this).css({'transform': 'rotate(0)'});
			$("#ensign-nivoslider .nivo-nextNav").trigger('click');
		
		$(this).css({'transform': 'rotate(0)'});
		hidde = false;
	}
	
});

})



 
})(jQuery); 

})



 
})(jQuery); 