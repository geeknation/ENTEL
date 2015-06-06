<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Forms and AJAX and other stuff</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-fileinput/css/fileinput.min.css">
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap-fileinput/js/fileinput.min.js"></script>
		<script type="text/javascript" src="ajaxform/ajaxForm.js"></script>
		<style type="text/css">
			.wrap {
				width: 80%;
				margin: 0 auto;
			}
			.overlay {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				z-index: 10;
				background-color: rgba(255,255,255,0.5); /*dim the background*/
				visibility: hidden;	
			}
		</style>
	</head>
	<body>
		<div class="row">
			<div class="col-md-5">
				<div class="overlay"></div>
				<form  id="ajaxform" enctype="multipart/form-data">

					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" class="form-control" name="firstname" id="" placeholder="">
					</div>
					<div class="form-group">
						<label for="">Other Names</label>
						<input type="text" class="form-control" name="othernames" id="" placeholder="">
					</div>
					<div class="form-group input-append date" id="date-pick">
						<label for="">Date</label>
						<input type="text" class="form-control" name="date"  data-format="dd/MM/yyyy">
						</input>
						<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i> </span>
					</div>
					<div class="form-group">
						<label for="file-upload">Upload Files</label>
						<input type="file" class="form-control" name="files[]" id="file-upload" multiple="true">
						<div id="image-preview"></div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" id="submitform" value="Upload">
					</div>

				</form>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
						0%
					</div>
				</div>
			</div>

		</div>

		<script type="text/javascript">
			//$('#date-pick').datepicker();

			$("#file-upload").fileinput({
				browseClass : "btn btn-primary btn-block",
				showCaption : true,
				showRemove : true,
				showUpload : false
			});

			var options = {
				//target:"div.response",
				url : "ajaxform.php",
				type : "POST",
				// dataType : "json",
				uploadProgress : function(event, position, total, percentComplete) {
					$(".overlay").css("visibility", "visible");
					$(".progress-bar").attr("aria-valuenow", percentComplete);
					$(".progress-bar").css("width", percentComplete + "%");
					$(".progress-bar").text(percentComplete + "%");
				},
				success : function(responseText,statusText) {
					//alert(responseText);
					if(statusText=="success"){
						$(".overlay").css("visibility", "hidden");
					}
					console.log(responseText);
				}
			};
			//submit the form via ajax.
			$("#ajaxform").ajaxForm(options);
		</script>

	</body>
</html>

