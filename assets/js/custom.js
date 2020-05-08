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
function readURL2(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview2").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL3(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview3").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL4(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview4").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

function readURL5(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview5").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
function readURL6(input)
{
	if(input.files && input.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			$("#preview6").attr('src',e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#p1").change(function(){
	readURL(this);
});
$("#p2").change(function(){
	readURL2(this);
});
$("#p3").change(function(){
	readURL3(this);
});
$("#p4").change(function(){
	readURL4(this);
});
$("#p5").change(function(){
	readURL5(this);
});
$("#p6").change(function(){
	readURL6(this);
});

$(document).ready(function(){
	$("#sms_feature").on('change', function(e){
		e.preventDefault();
		let status = $(this).val();
		let data = {
			status: status
		}

		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
				alert(json.message);
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		})

	})
})

$(document).ready(function(){
	$("#d_arrival").on('change', function(e){
		e.preventDefault();
		let day_arrival_sms = $(this).val();
		let data = {
			day_arrival_sms: day_arrival_sms
		}

		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
				alert(json.message);
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		})

	})
});

$(document).ready(function(){
	$("#d_departure").on('change', function(e){
		e.preventDefault();
		let day_departure_sms = $(this).val();
		let data = {
			day_departure_sms: day_departure_sms
		}

		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
				alert(json.message);
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		})

	})
});

$(document).ready(function(){
	$("#b_arrival").on('change', function(e){
		e.preventDefault();
		let board_arrival_sms = $(this).val();
		let data = {
			board_arrival_sms: board_arrival_sms
		}

		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
				alert(json.message);
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		})

	})
})

$(document).ready(function(){
	$("#b_departure").on('change', function(e){
		e.preventDefault();
		let board_dept_sms = $(this).val();
		let data = {
			board_dept_sms: board_dept_sms
		}

		$.ajax({
			data: data,
			cache: false,
			url: "ajax.php",
			type: "POST",
			success: function(x){
			    var json = JSON.parse(x);
				alert(json.message);
				location.reload();
			},
			error: function(e){
				console.log(e);
			}
		})

	})
});

