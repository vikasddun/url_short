$(document).ready(function(e) {

	var form = "#url_form_id";
	$(form).validate({
		highlight:function (element, errorClass, validClass) {

                $(element).addClass('validation-error');
            },
		submitHandler: function(form) { 
				
				$.ajax({
					type: "POST",
					url: $(form).attr('action'),
					data: $(form).serialize(),
					dataType: 'JSON',
					success: function(response) {
						//console.log('success');
						
						var link = response.data;
						if(response.status == 'success') {
							var href = "<a href=\""+link+"\">"+link+"</a>";
							$('#hashed_url').html("<strong>Shortened URL:</strong> <a href=\""+link+"\" target=\"_blank\">"+link+"</a>");

						} else {
							//console.log('error in ajax');
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						//console.log('response error');
						//console.log('error occured' + errorThrown);
						return false;
					}
				});
			}
	});


});

