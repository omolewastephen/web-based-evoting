function readURL(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

function Ajax(data)
{
	return 
}




$("#p1").change(function(){
	readURL(this);
});





$(document).ready(function(){
	$("#loginform").on('submit', function(e){
		e.preventDefault();
        var submit = $("#login");
		submit.attr('disabled','disabled');
		submit.attr("value","Please wait. Authenticating ...");


        var form = $(this);
        var data = form.serializeArray();

		var result = { };
		$.each(data, function() {
		    result[this.name] = this.value;
		});


		if(!result.email || !result.password){
			Error("Fill the form to continue");
		}

		PNotify.prototype.options.styling = "bootstrap3";
		$.ajax({
			data: data,
			cache: false,
			url: "ajax",
			type: "POST",
			success: function(xhr){
				console.log(xhr);
				if(xhr == 'true'){
					new PNotify({
				      title: 'Message',
				      text: 'Authentication successful. Redirecting to dashboard',
				      desktop: true,
				      type:'success',
				      icon: 'fa fa-bell',
				      animate: true,
				      delay: 3000,
				      after_close: function(PNotify) {
		                    submit.attr('disabled','disabled');
						    submit.attr("value","Login Successful. Redirecting...");
						    window.location = 'dashboard.php';
		                }
				    });
				}else{
					new PNotify({
				      title: 'Message',
				      text: 'Invalid login credentials. Please try again',
				      desktop: true,
				      type:'error',
				      animation: "tada",
				      icon: 'fa fa-times',
				      delay: 3000,
		              after_close: function(PNotify) {
		                    submit.removeAttr('disabled');
						    submit.attr("value","Login");
		                }
				    });
				}
			    
			},
			error: function(e){
				console.log(e);
			}
	    })

	});
})


