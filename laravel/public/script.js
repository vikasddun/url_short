$(document).ready(function(e) {

	var form = "#url_form_id";
	$(form).validate({
		highlight:function (element, errorClass, validClass) {

                $(element).addClass('validation-error');
            },
		submitHandler: function(form) { 
				console.log('Ajax Submit');
				$.ajax({
					type: "POST",
					url: $(form).attr('action'),
					data: $(form).serialize(),
					dataType: 'JSON',
					success: function(response) {
						console.log('success in ajax');

						if(response.status == 'success') {
							$('#hashed_url').html(response.data);

						} else {
							console.log('error in ajax');
							//validation.showMessage(data);
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						console.log('response error');
						console.log('error occured' + errorThrown);
						return false;
					}
				});
			}
	});


});

