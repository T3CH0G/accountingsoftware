$(document).ready(function(){
		
	var clicked = 1;

	$(window).scroll(function() {
		
		var w = window.innerWidth;
		var logo = $('.navlogo');
		var link = $('.navlink');


		function reset() {
			logo.removeClass('zoominL');
			logo.removeClass('zoominS');
			logo.removeClass('zoomoutL');
			logo.removeClass('zoomoutS');
			link.removeClass('godownL');
			link.removeClass('godownS');
			link.removeClass('goupL');
			link.removeClass('goupS');
		}
		if( $(document).scrollTop() > 2/3*$('.intro').height() )
		{
			$('.grid1 img').addClass('animated bounceIn');
		
		}

		if (w >= 1280) {
			if ($(document).scrollTop() > 50) {
				reset();
				$('.navbar').css({'height' : '80px'});
				$('.first').css({'margin-top' : '180px'});
				logo.addClass('zoomoutL');
				link.addClass('goupL');
				
			} else {
				reset();
			  $('.navbar').css({'height' : '185px'});
			  $('.first').css({'margin-top' : '185px'});
			  logo.addClass('zoominL');
				link.addClass('godownL');
				
			    
			}
		} else if (w >= 1024) {
			if ($(document).scrollTop() > 50) {
				reset();
				$('.navbar').css({'height' : '80px'});
				$('.first').css({'margin-top' : '180px'});
				logo.addClass('zoomoutS');
				link.addClass('goupS');
				
			} else {
				reset();
			  $('.navbar').css({'height' : '200px'});
			  $('.first').css({'margin-top' : '200px'});
			  logo.addClass('zoominS');
				link.addClass('godownS');
				
			    
			}
		} else {
			reset();
			$('.navbar').removeAttr('style');
			$('.first').removeAttr('style');	
		}
	});


	$('.navbar-toggle').click(function(event){
      var open = $('.navbar-toggle').attr('aria-expanded');
		  if (open==="true") {
		    $('.navdiv').css({'background-color' : 'transparent'});
		    // $('.navdiv').addClass('animated fadeOutUp');                   
		  } else {
		    $('.navdiv').css({'background-color' : '#000'});
		    $('.navdiv').css({'height' : 'auto'});
		  }
    });

	   var itemsToShow = 3;
	   var itemListSize = $('.item-list li').length;
	   var loadMoreButtonMaxTime = Math.ceil(itemListSize/itemsToShow);
	   var items = [];
	   var start = 1;
	   var end = itemsToShow-1;

	   for(var i=1; i<loadMoreButtonMaxTime; i++){
	   	start = (i*itemsToShow);
	   	end = (i*itemsToShow)+itemsToShow;
	   	items[i]=$('.item-list li').slice(start,end);
	   }

	   $('.item-list li:gt(' + (itemsToShow-1) + ')').remove();
	   $('.item-list').hide().fadeIn(1200);

	   var $container=$('.item-list');

	   window.onAnimationFinished = function() {
	   	$('.read-more').addClass('show');
	   };

	 	$container.isotope({
		    resizable: false,
		    masonry: { columnWidth: $container.width() / 3 }
			}, onAnimationFinished );

	 $('.read-more').attr('data-value','0');
	    
 	 $('.read-more').click(function(){

    	var currentValue = $(this).attr('data-value');
    	var newValue = parseInt(currentValue) + 1;
    	$(this).attr('data-value', newValue);

    	var $newEls = $( items[newValue] );
    	$container.append( $newEls ).isotope( 'appended', $newEls );
   
	    if( newValue +1 == loadMoreButtonMaxTime ) {
	        $(this).hide();
	    }

    return false;


 	});

  $('.main-iso').isotope({
  	itemSelector: 'figure',
  	layoutMode: 'fitRows'
  });
   
  
});

