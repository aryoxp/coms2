$(function(){
	
	$('.btn-update').click(function(event){

        event.preventDefault();
		//alert($('.new-password').val());

        var newpassword = $('.new-password').val();
        var newpassword2 = $('.new-password2').val();
        var oldpassword = $('.old-password').val();

        if(newpassword !== undefined) {

            if(newpassword.trim().length == 0) {
                alert('New password may not be blank!');
                return false;
            }

            if(newpassword != newpassword2) {
                alert('New Password and and New Password (again) must be the same!');
                return false;
            }

            if(oldpassword == newpassword) {
                alert('New Password and Old Password are equal! You can not change an equal old and new password value.');
                return false;
            }
        } else {
            alert('Password may not be blank!');
            return false;
        }
		
		if(confirm('You have to re-login with your new password once it has been updated! Continue change your password?')) {		
			$.post(
				base_url + 'password/update',
				$('#change-password-form').serialize(),
				function(data){
					if(data.status.trim() == "OK") {
						alert('Password has been updated! You have to login again!');
						document.location = base_url + 'auth/logoff';
					} else alert('Error: ' + data.error);
				},
				"json"
				).error(function(xhr) {
					alert(xhr.responseText);
			});
		}
		
		return false;
	});
	
});