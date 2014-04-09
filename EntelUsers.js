var EntelUser = {
	//login function using AJAX
	"login" : function(formData) {
		$.ajax({
			cache : false,
			data : formData,
			type : "POST",
			url : "engine.php",
			dataType : "json",
			beforeSend : function() {
				$("#console").html('<div class="alert alert-info">Attempting Login....</div>');
			},
			complete : function() {
			},
			success : function(data) {

			}
		});
	}
	
};

