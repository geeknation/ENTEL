var EntelPrefs = {
	getCookie : function(name) {
		return $.cookie(name);
	},
	//set cookie
	setCookie : function(name, value,days) {
		if($.cookie(name,value,{expires:days,path:window.location.pathname,domain:window.location.host,secure:true})){
			return true;
		}else{
			return false;
		}
		
		
	},
	//delete cookie
	deleteCookie : function(name) {
		if($.removeCookie(name)){
			return true;
		}else{
			return false;
		}
	},
	
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
