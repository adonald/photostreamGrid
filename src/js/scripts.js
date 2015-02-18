/* photostreamGrid v1.0.0
 * Copyright 2015 Alex Donald
 * Licensed under MIT
 * https://www.adonald.co.uk/projects/photostreamgrid/
--------------------------------------------------------------------*/

// Fade fixed header when scrolled away from top of screen
$(function() {
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        if(scrollTop != 0)
            $('.header').stop().animate({'opacity':'0.6'},400);
        else	
            $('.header').stop().animate({'opacity':'1'},400);
    });
});