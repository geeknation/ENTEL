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

	Entelytics.prototype.visit = function(response) {
		console.log("from Entelytics:"+response.name);

		var visitCookie = $.cookie("etl-visited");
		if (typeof visitCookie=="undefined") {
			
			 $.cookie("etl-profile",response, { expires: 7, path: '/' });
			
			$.cookie('etl-visited', true, { expires: 7, path: '/' });

			$.cookie('etl-browser-profile',Entelytics.prototype.getBrowser(),{expires:7,path:"/"});

		}else{
			console.log("set");
		}
		//Entelytics.prototype.addVisit(); 

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
	Entelytics.prototype.showProfile=function(){
		console.log($.cookie());
	}
	Entelytics.prototype.removeCookies=function(){
		$.removeCookie('etl-profile');
		
	};
	Entelytics.prototype.getBrowser=function(){
		var parser = new UAParser();
		return parser.getResult();
	}
}


