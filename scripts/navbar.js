var totalHeight = 0;
var lastSectionHeight = $( $('.mainSect')[ $('.mainSect').length-1 ] ).height();

$('.mainSect').each(function (index, sect) {
    totalHeight += $(sect).height();
});
    

$(window).scroll(function() {
    var scrollTop = $(document).scrollTop()
    // Sticky nav
    if ( scrollTop >= $('#main-wrapper').offset().top ) {
        $('#navbar').css({
            position: 'fixed',
            top: '0',
            'z-index': '999'
        });
        
        $('#about-container').css('margin-top', '60px');
        
    } else {
        $('#navbar').removeAttr('style');
        $('#about-container').removeAttr('style');
    }
    
    
    $('.mainSect').each(function (index, sect) {
        var tolerance = 100;
        var top = $(sect).offset().top - tolerance;
        var bottom = $(sect).offset().top + $(sect).height() - tolerance;

        if ( scrollTop >= top && scrollTop <= bottom ) {
            $('a[href="#'+$(sect).attr('id')+'"]').css({color: '#fed136'});
        } else {
            $('a[href="#'+$(sect).attr('id')+'"]').css({color: 'white'});
        } 
        
        if ( $(window).scrollTop() > (totalHeight - lastSectionHeight) ) {
            $('a[href="#'+$(sect).attr('id')+'"]').css({color: 'white'});
            $('a[href="#contact"]').css({color: '#fed136'});
        }
    });
});



$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top - 70
        }, 600);
    }
});