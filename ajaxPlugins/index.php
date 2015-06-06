<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ajax Plugins</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="jquery-timeout/src/jquery.timeout.js"></script>
		<script type="text/javascript" src="jsontotable.js"></script>
		<script type="text/javascript">
		
			$(document).ready(function($) {
				function dispClick() {
					$("body").append("Click!");
				}
				//fake user profile data.
				$.ajax({
					url : 'http://api.randomuser.me/?results=50',
					dataType : 'json',
					success : function(jsonData) {
						var i = 0;
						$.each(jsonData.results, function(index, obj) {		
							$user = obj.user;
							$("#user:last").find("#user-image").attr("src", $user.picture.large);
							$("#user:last").find("#user-name").text($user.name.title + " " + $user.name.first + " " + $user.name.last);
							$("#user:last").find("#user-email").text($user.email);
							$("#user:last").find("#user-phone").text($user.phone);
							var $template = $("#user").clone();
							$(".user").last().after($template);
							console.log(i++);			
						});
					}
				});
			});
		</script>
		<style>
			#user {

				margin: 0 auto;
				margin-top: 2%;
			}
		</style>
	</head>
	<body>
		<div class="row">
			<div class="col-sm-2 col-md-3 user" id="user">
				<div class="thumbnail">
					<img src="..." alt="..." id="user-image">
					<div class="caption">
						<h3 id="user-name"></h3>
						<h5 id="user-email"></h5>
						<h5 class="text-muted pull-right" id="user-phone"></h5>
						<p>
							<a href="#" class="btn btn-primary" role="button">Edit Profile</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

