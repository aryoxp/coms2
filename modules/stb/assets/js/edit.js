$(function(){

    if(CKEDITOR){
        CKEDITOR.config.toolbar_minimal =
            [
                [ 'Source', '-', 'Bold', 'Italic', '-', 'Subscript','Superscript' ], [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ], ['TextColor']
            ];
        CKEDITOR.replace('ckeditor', {
            toolbar:'minimal',
            height:100,
            resize_enabled: false,
            customConfig:'',
            removePlugins: 'elementspath'
        });
    }

	$('#form-media').submit(function(event){
        if(validatePost()) {
            $('#form-media').submit();
        } else event.preventDefault();
	});

	$('#btn-submit')
	  .click(function () {
        var btn = $(this);
        btn.button('loading');
		savePost(btn);
	});
	
	var validatePost = function(){
		var contentTitle = $('#media-name').val().trim();
		if( contentTitle == ''	) {
			alert('You need to have at least media name to be saved.');
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
            $('#form-media').submit();
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

$(document)
    .on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});
