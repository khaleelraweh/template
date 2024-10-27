$(document).ready(function()
{
	$('.sendmail').click(function(e)
	{
		e.preventDefault();
		

		var parentClass = $(this).attr("parent-element");
		
		var name = $(parentClass + ' .name-validation').val();
		var email = $(parentClass + ' .email-validation').val().toLowerCase();
		var number = $(parentClass + ' .subject-validation').val();
		var comment = $(parentClass + ' .message-validation').val();
		var error = false;
		$(parentClass + ' #errorSend').addClass('hide');
		$(parentClass + ' #successSend').addClass('hide');
		$(parentClass + ' p.error').remove();
		if(name == "")
		{
			$(parentClass + " .name-validation").addClass("error");
			$(parentClass + " .name").remove();
			$(parentClass + " .name-validation").after('<p class="error name">Please enter name</p>');
			$(parentClass + ' #errorSend').removeClass('hide');
			error = true;

		}	
		if(email == "")
		{
			$(parentClass + " .email-validation").addClass("error");
			$(parentClass + " .email").remove();
			$(parentClass + " .email-validation").after('<p class="error email">Please enter email address</p>');
			$(parentClass + '.errorSend-validation').removeClass('hide');
			error = true;
		}
		else if(!validateEmail(email))
		{
			$(parentClass + " .email-validation").addClass("error");
			$(parentClass + " .email").remove();
			$(parentClass + " .email-validation").after('<p class="error email">Your email address is invalid. Please enter a valid address.</p>');
			$(parentClass + ' #errorSend').removeClass('hide');
			error = true;
		}
		else
		{
			$( ".email" ).remove();
		}
		if (number == "") {
			$(parentClass + " .subject-validation").addClass("error");
			$(parentClass + " .subject").remove();
			$(parentClass + " .subject-validation").after('<p class="error subject">Please enter subject</p>');
			$(parentClass + ' #errorSend').removeClass('hide');
			error = true;
		}
		if(comment == "")
		{
			$(parentClass + " .message-validation").addClass("error");
			$(parentClass + " .message").remove();
			$(parentClass + " .message-validation").after('<p class="error message">Please enter message</p>');
			$(parentClass + " #errorSend").removeClass('hide');
			error = true;
		}

		if (error == false) 
		{
			var dataString = $(parentClass + ' .contact-form-validation').serialize(); // Collect data from form
            $.ajax({
                type: "POST",
				url: $(parentClass + ' .contact-form-validation').attr('action'),
                data: dataString,
                timeout: 6000,
                error: function (request, error) 
                {

                },
                success: function (response) 
                {
                    response = $.parseJSON(response);
                    if (response.success) 
					{
						$(parentClass + ' #successSend').removeClass('hide');
						//$("#contact-form")[0].reset();
						$(parentClass + " .name-validation").val('');
						$(parentClass + " .email-validation").val('');
						$(parentClass + " .subject-validation").val('');
						$(parentClass + ' .message-validation').val('');
                    } 
					else 
					{
						$(parentClass + ' #errorSend').removeClass('invisible');
                    }
                }
            });
            return false;
        }
        else
        {
        	return false;
        }
		
	}); 
	
	$('.name-validation,.email-validation,.subject-validation,.message-validation').keyup(function ()
	{
		var parentClass = $(this).closest("form").find(".sendmail").attr("parent-element");
		var cid =  $(this).attr('id');
		$( "."+cid ).remove();
		$('#errorSend').addClass('hide');
		$("#"+cid ).removeClass('error');
		$(this).removeClass('error');
		$(this).closest('div').find("p").remove();
	});
	
	function validateEmail($email) 
	{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( $email );
	}
	
	// $(".fancybox").fancybox({
	// 	openEffect	: 'fade',
	// 	closeEffect	: 'fade'
	// });
});

	