$(function(){
	
	$('.btn-install').click(function(event){
        event.preventDefault();

        if(!confirm("Continue install and initialize media database?"))
            return false;

		$.post(
			base_url + 'module/stb/setting/install',
			{},
			function(data){
				if(data.status.trim() == "OK") {
                    window.location = base_url + 'module/stb/media';
                } else alert(data.error);
			},
			"json"
		).error(function(xhr) {
			alert(xhr.responseText);
		});
	});
});