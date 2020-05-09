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

function Error(text)
{

	$(function(){
	PNotify.prototype.options.styling = "bootstrap3";
	PNotify.prototype.options.styling = "fontawesome";
    new PNotify({
      title: 'Error Notification',
      text: text,
      desktop: true,
      type:'error',
      icon: true
    });
  });
}


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


		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
			},
			error: function(e){
				Error(e.toString());
			}
	    })

	});
})


