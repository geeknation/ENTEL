/*
 Entel Analytics script

 *************************
 cookie{
 name:"customer"
 value:"visited"
 }
 */
/*
 $("body").on("load",function(){
 $(this).append('<input type="text" id="t_v">')
 });*/

function Entelytics() {

	Entelytics.prototype.visit = function(name) {
		
		var visitCookie = $.cookie(name);
		if (visitCookie == null) {
			//mark as new visitor
			$.get("Entelytics.php", {
				"get" : "all-visits"
			}, function(data) {
				var visitorname = "Customer" + (data+1);
				$.cookie("visitor", visitorname, {
					expires : 1
				});
				Entelytics.prototype.addNewVisitor(visitorname);
			});

		}
		Entelytics.prototype.addVisit(); 

	};
	Entelytics.prototype.addNewVisitor = function(v) {
		$.post("Entelytics.php", {
			"visitor" : v
		}, function(data) {
			console.log(data);
		});

	};
	Entelytics.prototype.addVisit = function() {
		$.post("Entelytics.php", {
			"addvisit" : "plus-one"
		}, function(data) {
			console.log(data);
		});
	};
}


$(document).ready(function() {

});
