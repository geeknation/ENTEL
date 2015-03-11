var route = {
_routes : {

}, // The routes will be stored here
add : function(url, action){
	this._routes[url] = action;
},
run : function(){
jQuery.each(this._routes, function(pattern){
if(location.href.match(pattern)){
// "this" points to the function to be executed
this();
}
});
},

parseUrl:function(url){
	
	// You want to parse this address into parts:
	var url = 'http://www.patikana.co.ke/createaccount.php';
	// The trick; create a new link with the url as its href:
	var URLparts=[];
	var a = $('<a>',{ href: url });
	URLparts.push('Host name: ' + a.prop('hostname'));
	URLparts.push('Path: ' + a.prop('pathname'));
	URLparts.push('Query: ' + a.prop('search'));
	URLparts.push('Protocol: ' + a.prop('protocol'));
	URLparts.push('Hash: ' + a.prop('hash'));
	console.log(URLparts);
	
	
}



}
// Will execute only on this page:
route.add('page.html', function(){
	
});
route.add('page.html', function(){
	
});

// You can even use regex-es:
route.add('.*.html', function(){
	alert('This is using a regex!');
});

route.run();