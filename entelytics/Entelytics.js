/*
 Entel Analytics script

 *************************
*/

function Entelytics() {

	Entelytics.prototype.visit = function(response) {
		
		var visitCookie = $.cookie("etl-visited");
		var browserProfile=Entelytics.prototype.getBrowser();
		if (typeof visitCookie=="undefined") {
			console.log("Storing...");
			

			$.cookie("etl-profile",response, { expires: 7, path: '/' });
			
			$.cookie('etl-visited', true, { expires: 7, path: '/' });

			$.cookie('etl-browser-profile',browserProfile,{expires:7,path:"/"});

			Entelytics.prototype.addNewVisitor(response,browserProfile);

		}else{
			console.log("set");
			
		}
		//Entelytics.prototype.addVisit(); 

	};
	Entelytics.prototype.addNewVisitor = function(response,browserProfile) {
		$.post("Entelytics.php", {
			"etlProfile":JSON.stringify(response),
			"etlBrowserProfile":JSON.stringify(browserProfile),
			"action":'new-user'
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


