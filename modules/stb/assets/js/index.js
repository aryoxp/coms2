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
	
});