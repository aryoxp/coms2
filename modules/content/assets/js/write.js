$(function(){
	
	$('#writeTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

    if(CKEDITOR){
        CKEDITOR.config.toolbar_minimal =
            [
                [ 'Source', '-', 'Bold', 'Italic', '-', 'Subscript','Superscript' ], [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ], ['-', 'Link', 'Unlink'], ['TextColor']
            ];

        CKEDITOR.replace('ckeditor', {
            toolbar:'minimal',
            height:200,
            resize_enabled: false,
            customConfig:'',
            removePlugins: 'elementspath'
        });
    }

	$('#write-form').submit(function(){
		return false;
	});
	
	var content_status = 'published';
	
	$('#btn-publish')
	  .click(function () {
        var btn = $(this);
		content_status = 'published';
        btn.button('loading');	
		savePost(btn);	
	});	
	
	$('#btn-draft')
      .click(function () {
        var btn = $(this);
		content_status = 'draft';
        btn.button('loading');
        savePost(btn);
    });
	
	
	var validatePost = function(){
		var contentTitle = $('#content_title').val().trim();
		if( contentTitle == ''	) {
			alert('You need to at least have title on your content to be saved.');
			return false;
		}
		return true;
		
	}
	  
	  
	var savePost = function(btn){

        if(CKEDITOR)
        {
            for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();
        }

		if(validatePost()) {
					
			var d = $('#write-form').serialize() + "&content_status="+ content_status;

			$('#save-status').text('Saving...');
			
			$.post(
				base_url + "module/content/home/save",
				d,
				function(data) {
                    alert(data);
                    return;
					if(data.status == "OK") {
						$('#id').val(data.id);
						$('#save-status').text(data.modified);
                        exit;
						window.location.replace(base_url + "module/content/home/edit/" + data.id);
					} else {
						$('#save-status').text('Failed to save content. ' + data.error);
					}
					btn.button('reset');
				}
			).error(function(data){
				alert("error: " + data.responseText);
				btn.button('reset');
			});
		} else {
			btn.button('reset');	
		}
		return false;
	}
	
	$('.btn-discard').click(function(){
        if(confirm("Discard the form and go back to content index?"))
            window.location.replace(base_url + "module/content");
    });


});