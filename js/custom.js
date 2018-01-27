$(document).ready(function(){
	//scroll to top
	 $(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        
	        $('#return-to-top').fadeIn(200); 
	        $("#sticker").addClass("lightheader ");
	    } else {
	        $('#return-to-top').fadeOut(200);  
	        $("#sticker").removeClass("lightheader");
	    }
	});
	$('#return-to-top').click(function() {    
	    $('body,html').animate({
	        scrollTop : 0          
	    }, 500);
	});


	$(".hero-slides, .programe-slides").owlCarousel({
		items:1,
		autoplay:true,
		loop:true,
		dots:true,
	});
/*
	$(".programe-slides").owlCarousel({
		items:1,
		autoplay:true,
		loop:true,	
	});*/


	$(".recent-news-slide, .upcoming-news-slide").owlCarousel({
		items:3,
		responsive : {
			320 :{items:1},
            576 : { items : 2  }, // from zero to 480 screen width 4 items
            768 : { items : 2  },
            992 : { items: 3 }, // from 480 screen widthto 768 6 items
            1024 :{ items : 3   // from 768 screen width to 1024 8 items
            }
        },
		margin:5,
		autoplay:true,
		loop:true,
		nav:true,
		navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],

	});

	$(".company-logo-wrapper").owlCarousel({
		items:5,
		responsive : {
			320 :{items:2},
            576 : { items : 3  }, // from zero to 480 screen width 4 items
            //768 : { items : 3  },
            992 : { items: 4 }, // from 480 screen widthto 768 6 items
            1024 :{ items : 5   // from 768 screen width to 1024 8 items
            }
        },
		margin:20,
		autoplay:true,
		loop:true,
		autoplayTimeout:1100,
	});
						// year/month/day
	$('#clock').countdown('2018/02/01').on('update.countdown', function(event) {
  var $this = $(this).html(event.strftime(''
				+ '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span>Day%!d</span></div>'
				+ '<div class="counter-box"><div class="number">%H</div><span>Hours</span></div>'
				+ '<div class="counter-box"><div class="number">%M</div><span>Minutes</span></div>'
				+ '<div class="counter-box last"><div class="number">%S</div><span>Seconds</span></div></div>'));
	});


	
});

