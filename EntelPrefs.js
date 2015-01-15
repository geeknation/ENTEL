var EntelPrefs = {
	getCookie : function(name) {
		var start = document.cookie.indexOf(name + "=");
		var len = start + name.length + 1;
		if ((!start ) && (name != document.cookie.substring(0, name.length) )) {
			return null;
		}
		if (start == -1)
			return null;
		var end = document.cookie.indexOf(';', len);
		if (end == -1)
			end = document.cookie.length;
		return unescape(document.cookie.substring(len, end));
	},

	//set cookie
	setCookie : function(name, value, expires, path, domain, secure) {
		var today = new Date();
		today.setTime(today.getTime());
		if (expires) {
			expires = expires * 1000 * 60 * 60 * 24;
		}
		var expires_date = new Date(today.getTime() + (expires));
		document.cookie = name + '=' + escape(value) + ((expires ) ? ';expires=' + expires_date.toGMTString() : '' ) + //expires.toGMTString()
		((path ) ? ';path=' + path : '' ) + ((domain ) ? ';domain=' + domain : '' ) + ((secure ) ? ';secure' : '' );
	},
	//delete cookie
	deleteCookie : function(name, path, domain) {
		if (getCookie(name))
			document.cookie = name + '=' + ((path ) ? ';path=' + path : '') + ((domain ) ? ';domain=' + domain : '' ) + ';expires=Thu, 01-Jan-1970 00:00:01 GMT';
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
