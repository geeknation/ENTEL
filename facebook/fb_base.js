window.fbAsyncInit = function() {
  FB.init({
    appId : '829443030445912',
    cookie : true, // enable cookies to allow the server to access
    // the session
    xfbml : true, // parse social plugins on this page
    version : 'v2.0' // use version 2.0
  });
  FB.getLoginStatus(function(response) {
    if(response.status === 'connected'){
      FBuser();
    }
    else if (response.status === 'not_authorized') {
      $(".social-auth-links").html('<a href="#" onclick="FBlogin()" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>');
    } else {
      $(".social-auth-links").html('<a href="#" onclick="FBlogin()" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>');
    }
  });
};
(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function FBlogin() {
  FB.login(function(response) {
    if (response.authResponse) {
      FBuser();
    } 
  }, {
    scope : 'user_friends,user_birthday,user_events,user_location'
  });
}
function logout() {
  FB.logout(function(reponse) {
    location.href = "http://localhost:8080/ENTEL/facebook/me.html#";
  });
}
function FBuser() {
  
  FB.api('/me', function(response) {    
   
    // var $lytics=new Entelytics();
    
    // $lytics.visit(response);
    console.log(response);
    

    $(".social-auth-links").html('<button class="logout btn" onclick="logout()">Logout</button>') 

    
  });
}

function FBuserFriendlists(){
  FB.api('/me/friendlists', function(response) {    
    
    console.log(response);
    

    
  });
}

function FBuserEvents(){
  FB.api('/me/events', function(response) {    
   
    console.log(response);
    

    
  });
}

function FBuserInterests(){
  FB.api('/me/music', function(response) {    
   
    console.log(response);
    

    
  }); 
}

