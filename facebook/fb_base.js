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
( function(d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
  }(document));
function FBlogin() {
  FB.login(function(response) {
    if (response.authResponse) {
      FBuser();
    } 
  }, {
    scope : 'user_location,user_birthday'
  });
}
function logout() {
  FB.logout(function(reponse) {
    location.href = "signup.php";
  });
}
function FBuser() {
  
  FB.api('/me', function(response) {    
    console.log(response);
    var $lytics=new Entelytics();
    
    $lytics.visit(response);
    $lytics.showProfile();


  });
}