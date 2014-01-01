/**
 * Created by aryo on 11/10/13.
 */
$(function(){
    //var sidebarWidth = $('.coms-sidebar').width();
    $('.btn-sidebar').click(function(){

        if($('.coms-content').hasClass('col-md-11')) {
            $('.coms-content').toggleClass('col-md-11 col-md-10');
            $('.coms-sidebar').toggleClass('col-md-2 col-md-1');
        } else {
            $('.coms-sidebar').toggleClass('col-md-2 col-md-1');
            $('.coms-content').toggleClass('col-md-11 col-md-10');
        }

        $('.btn-minimize-text').toggle();
        $('.btn-minimize-icon').toggleClass('glyphicon-chevron-left glyphicon-chevron-right');

        $('.nav-text').toggle();
        $('.panel-heading').toggleClass('center');
        $('.panel-body').toggleClass('center');
    });

    $('.btn-logout').click(function(event){
        if(!confirm('Continue log out from system?')){
            event.preventDefault();
        }
    });

    $('.btn-backtop').click(function(event){
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        event.preventDefault();
    });

    $('.coms-submenu').tooltip();
    $('.btn-notification').tooltip();

    $('.btn-notification').click(function(event){
        $('.flyover').toggleClass('in');
        $('.btn-notification').toggleClass('active');
    });

    if($('#notification-container').data('count') != "0") {
        $('.flyover').toggleClass('in');
        setTimeout( "$('.flyover').toggleClass('in');", 3000 );
    }

});