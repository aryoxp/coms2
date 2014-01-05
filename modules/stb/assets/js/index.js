$(function(){
	
	$('.btn-delete').click(function(event){
		
		var pid = $(this).data("id");
        var type = $(this).data('type');
		
		if(!confirm("Delete this media? Once done, this action can not be undone."))
            return;
		
		var row = $(this).parents('tr');
				
		$.post(
			base_url + 'module/stb/media/delete',
			{id: pid, type: type},
			function(data){
				if(data.status.trim() == "OK")
					row.fadeOut();
				else alert(data.error);
			},
			"json"
			).error(function(xhr) {
				alert(xhr.responseText);
			});
        event.preventDefault();
	});

    //$('.media-description').dblclick(function(){
    //    $(this).toggleClass('excerpt');
    //});

    $('.media-description').each(function() {
        $(this).data('originalHeight', $(this).height());
        var originalHeight = $(this).height();
        if(originalHeight<65)
            $(this).css({'height': originalHeight+'px', 'overflow': 'hidden'});
        else $(this).css({'height': '65px', 'overflow': 'hidden'});
        $(this).dblclick(function() {
            if($(this).css("height") != "65px") {
                $(this).animate({height:'65px'}, 300, 'swing');
            } else {
                $(this).animate({height:originalHeight}, 300, 'swing');
            }
        });
            // animate $this to newHeight however you like here
    });
});