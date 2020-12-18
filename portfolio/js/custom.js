(function($) {
	'use strict';

	// PreLoader
	$(window).on("load", function (e) {
        $('#loading').fadeOut(200);
    })

	// Counter on Scroll
	var a = 0;
	$(window).scroll(function() {

	  var oTop = $('#counter').offset().top - window.innerHeight;
	  if (a == 0 && $(window).scrollTop() > oTop) {
	    $('.counter-value').each(function() {
	      var $this = $(this),
	        countTo = $this.attr('data-count');
	      $({
	        countNum: $this.text()
	      }).animate({
	          countNum: countTo
	        },

	        {
	          duration: 2000,
	          easing: 'swing',
	          step: function() {
	            $this.text(Math.floor(this.countNum));
	          },
	          complete: function() {
	            $this.text(this.countNum);
	            //alert('finished');
	          }

	        });
	    });
	    a = 1;
	  }
	});

	// line progressbar 
	$(document).ready(function() {
		

		function Progressbars(){

			$('#progressbar1').LineProgressbar({
				percentage: 100
			});
			$('#progressbar2').LineProgressbar({
				percentage: 100
			});
			$('#progressbar3').LineProgressbar({
				percentage: 80
			});
			$('#progressbar4').LineProgressbar({
				percentage: 80
			});
			$('#progressbar5').LineProgressbar({
				percentage: 85
			});
			$('#progressbar6').LineProgressbar({
				percentage: 85
			});
		}


		$('.skill-content').waypoint(function(){
			Progressbars();
		},{
			offset: '40%',
			triggerOnce: true 
		}); // waypoint
		
		Progressbars();
		hljs.initHighlightingOnLoad();

	});

	// Testimonial Carousel Active
	$('#t_carousel').owlCarousel({
	    loop: true,
	    dots: true,
	    items: 1,
	    autoplay: true,
	    mouseDrag: false,
	    animateIn: 'bounceIn',
	    animateOut: 'fadeOut',
	    autoplayHoverPause: true	    
	});

	// Parallax 
	$.stellar({
		responsive: true
	});

	// Smooth Scroll 
	$(document).ready(function(){
  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	});

	//ticky navbar
    $(document).ready(function() {
        $(window).scroll(function(){
          var sticky = $('nav'),
              scroll = $(window).scrollTop();

          if (scroll >= 50) sticky.addClass('sticky');
          else sticky.removeClass('sticky');
        });
    
    });

    // Closes the Responsive Menu on Menu Item Click
    $(document).ready(function(){
            $('.navbar-collapse ul li a').click(function() {
            $('.navbar-toggler:visible').click();
        });
    });

})(jQuery);