$(function() {
	
	$('#notification').hide();
	
	$('#logon-form').submit(function(event) {
		event.preventDefault();
		data = $('#logon-form').serialize();
		$.post(
		    base_url + "auth/logon",
		    data
		).done(function(data){
            if(data == "OK") {
                window.location.href = base_url;
                return;
            } else {
                alertDOM = '<div class="alert alert-danger alert-dismissable">' +
                    '<a class="close" data-dismiss="alert">&times;</a>' +
                    'Oh snap! There is something wrong. Change a few things up and try submitting again.</div>' +
                    '<div class="hidden">' + data + '</div>';
                $('#notification-container').html(alertDOM).hide().fadeIn('slow');
            }
		});
	});	
});