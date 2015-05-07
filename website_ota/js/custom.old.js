//------------------------------
		//Counter
		//------------------------------

		jQuery(function($) {
			$('.countprice').countTo({
				from: 5,
				to: 100000,
				speed: 1000,
				refreshInterval: 50,
				onComplete: function(value) {
					console.debug(this);
				}
			});
			$('.counthotel').countTo({
				from: 1,
				to: 3,
				speed: 2000,
				refreshInterval: 50,
				onComplete: function(value) {
					console.debug(this);
				}
			});			
		});


		var dateToday = new Date(); 
		jQuery(function(){
		$("#datepicker,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7,#datepicker8,#datepicker9,#datepicker10,#datepicker11,#datepicker12,#datepicker13,#datepicker14").datepicker({
			minDate: dateToday
		});
		});

		jQuery(document).ready(function(){
			jQuery('.mySelectBoxClass').customSelect();
			});
		function mySelectUpdate(){
			setTimeout(function(){
			jQuery('.mySelectBoxClass').trigger('update');},200);
			}			

		jQuery(document).ready(function(){var nice=jQuery("html").niceScroll({cursorcolor:"#ccc",cursorborder:"0px solid #fff",railpadding:{top:0,right:0,left:0,bottom:0},cursorwidth:"5px",cursorborderradius:"0px",cursoropacitymin:0,cursoropacitymax:0.7,boxzoom:true,autohidemode:false});jQuery("#air").niceScroll({horizrailenabled:false});jQuery("#hotel").niceScroll({horizrailenabled:false});jQuery("#car").niceScroll({horizrailenabled:false});jQuery("#vacations").niceScroll({horizrailenabled:false});jQuery("#air2").niceScroll({horizrailenabled:false});jQuery("#hotel2").niceScroll({horizrailenabled:false});jQuery("#car2").niceScroll({horizrailenabled:false});jQuery("#vacations2").niceScroll({horizrailenabled:false});jQuery("#flighthotel2").niceScroll({horizrailenabled:false});jQuery("#cruise2").niceScroll({horizrailenabled:false});jQuery("#hotelcar2").niceScroll({horizrailenabled:false});jQuery("#flighthotelcar2").niceScroll({horizrailenabled:false});jQuery('html').addClass('no-overflow-y');});jQuery(document).ready(function(jQuery){var jQueryscrollTop;var jQueryheaderheight;var jQueryloggedin=false;if(jQueryloggedin==false){jQueryheaderheight=jQuery('.navbar-wrapper2').height()-20;}else{jQueryheaderheight=jQuery('.navbar-wrapper2').height()+100;}
		jQuery(window).scroll(function(){var jQueryiw=jQuery('body').innerWidth();jQueryscrollTop=jQuery(window).scrollTop();if(jQueryiw<992){}
		else{jQuery('.navbar-wrapper2').css({'min-height':110-(jQueryscrollTop/2)+'px'});}
		jQuery('#dajy').css({'top':((-jQueryscrollTop/5)+jQueryheaderheight)+'px'});
		
		jQuery(".scrolleffect").css({'top':((-jQueryscrollTop/5)+jQueryheaderheight)+30+'px'});
		
		jQuery(".tp-leftarrow").css({'left':20-(jQueryscrollTop/2)+'px'});jQuery(".tp-rightarrow").css({'right':20-(jQueryscrollTop/2)+'px'});});});jQuery(window).scroll(function(){var jQueryiw=jQuery('body').innerWidth();if(jQuery(window).scrollTop()!=0){jQuery('.mtnav').stop().animate({top:'0px'},500);jQuery('.logo').stop().animate({width:'100px'},100);}
		else{if(jQueryiw<992){}
		else{jQuery('.mtnav').stop().animate({top:'30px'},500);}
		jQuery('.logo').stop().animate({width:'120px'},100);}
		if(jQuery(window).scrollTop()>=300){jQuery('.social1').stop().animate({top:'0px'},100);setTimeout(function(){jQuery('.social2').stop().animate({top:'0px'},100);},100);setTimeout(function(){jQuery('.social3').stop().animate({top:'0px'},100);},200);setTimeout(function(){jQuery('.social4').stop().animate({top:'0px'},100);},300);setTimeout(function(){jQuery('.gotop').stop().animate({top:'0px'},200);},400);}
		else{setTimeout(function(){jQuery('.gotop').stop().animate({top:'100px'},200);},400);setTimeout(function(){jQuery('.social4').stop().animate({top:'-120px'},100);},300);setTimeout(function(){jQuery('.social3').stop().animate({top:'-120px'},100);},200);setTimeout(function(){jQuery('.social2').stop().animate({top:'-120px'},100);},100);jQuery('.social1').stop().animate({top:'-120px'},100);}});var theSide='marginLeft';var options={};options[theSide]=jQuery('.one').width()/2-15;jQuery(".one").mouseenter(function(){jQuery(".mhover",this).addClass("block");jQuery(".mhover",this).removeClass("none");jQuery(".icon",this).stop().animate(options,100);})
		jQuery(".one").mouseleave(function(){jQuery(".mhover",this).addClass("none");jQuery(".mhover",this).removeClass("block");jQuery(".icon",this).stop().animate({marginLeft:"0px"},100);});

			var tpj=jQuery;
			tpj.noConflict();

			tpj(document).ready(function() {

			if (tpj.fn.cssOriginal!=undefined)
				tpj.fn.css = tpj.fn.cssOriginal;

				tpj('.fullscreenbanner').revolution(
					{
						delay:6000,
						startwidth:1170,
						startheight:600,

						onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

						thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
						thumbHeight:50,
						thumbAmount:3,

						hideThumbs:0,
						navigationType:"bullet",				// bullet, thumb, none
						navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

						navigationStyle:false,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


						navigationHAlign:"left",				// Vertical Align top,center,bottom
						navigationVAlign:"bottom",					// Horizontal Align left,center,right
						navigationHOffset:30,
						navigationVOffset:30,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						touchenabled:"on",						// Enable Swipe Function : on/off


						stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
						stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

						hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
						hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
						hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


						fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
						fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!


						shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

					});


		});