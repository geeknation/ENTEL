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