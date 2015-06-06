<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Data tables</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.0/css/foundation.min.css">

		<link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" type="text/css">

		<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css" type="text/css">

		<!-- <link rel="stylesheet" href="bootstrap-dialog/dist/css/bootstrap-dialog.min.css" type="text/css"> -->
		<style>
			.wrapper {
				width: 100%;
				margin: 0 auto;
			}
			.menu {
				padding: 2% 0 2% 0;
			}
			#jsontotable {
				width: inherit;
			}

			#jsontotable > table {
				width: inherit;
			}
		</style>
	</head>
	<body>
		<div class="wrapper">
			<div class="ad">
				<!--This goes in your HEAD Section -->

				<!--Place the code below everywhere where you want an ad to appear. -->
			</div>
			<div class="menu">
				<!-- <div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-success" id="edit-row">
				Edit
				</button>
				<button type="button" class="btn btn-danger">
				Delete
				</button>

				</div> -->

				<ul class="button-group round">
					<li>
						<a href="#" class="button tiny" id="edit-row">Edit</a>
					</li>
					<li>
						<a href="#" class="button alert tiny" id="delete-row">Delete</a>
					</li>
					<li>
						<a href="#" class="button success tiny">Open</a>
					</li>

				</ul>
			</div>
			<div id="jsontotable" class="jsontotable"></div>
		</div>

		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script> -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.0/js/foundation/foundation.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.0/js/foundation/foundation.reveal.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>

		<script type="text/javascript" src="jquery.ajaxprogress/jquery.ajaxprogress.js"></script>
		<script type="text/javascript" src="underscore/underscore.js"></script>
		<script type="text/javascript" src="alertify/alertify.min.js"></script>
		<link rel="stylesheet" href="alertify/css/alertify.min.css" type="text/css">
		<link rel="stylesheet" href="alertify/css/themes/bootstrap.css" type="text/css">
		<!-- <script type="text/javascript" src="bootstrap-dialog/dist/js/bootstrap-dialog.min.js"></script> -->

		<script type="text/javascript" src="jsontotable.js"></script>

		<!-- <div class="modal fade" id="edit-modal">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title">Edit Customer</h4>
		</div>
		<div class="modal-body">
		<form>
		<span>Company Name</span>
		<input type="text" name="cname" id="cname" value=""/>
		<br />
		<span>Contact Name</span>
		<input type="text" name="conname" id="conname" value=""/>
		<br />
		<span>Contact Title</span>
		<input type="text" name="ctitle" id="ctitle" value=""/>
		<br />
		<span>Address</span>
		<input type="text" name="add" id="add" value=""/>
		<br />
		<span>City</span>
		<input type="text" name="city" id="city" value=""/>
		<br />
		</form>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
		Close
		</button>
		<button type="button" class="btn btn-primary">
		Save changes
		</button>
		</div>
		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- foundation 5 modal -->
		<div id="edit-modal" class="reveal-modal small" data-reveal>
			<h2>Edit</h2>
			<p class="lead">
				Customer Details
			</p>
			<p>
				<form id="customer-data">
					<span>Company Name</span>
					<input type="text" name="cname" id="cname" value=""/>
					<br />
					<span>Contact Name</span>
					<input type="text" name="conname" id="conname" value=""/>
					<br />
					<span>Contact Title</span>
					<input type="text" name="ctitle" id="ctitle" value=""/>
					<br />
					<span>Address</span>
					<input type="text" name="add" id="add" value=""/>
					<br />
					<span>City</span>
					<input type="text" name="city" id="city" value=""/>
					<br />
				</form>
			</p>
			<a class="close-reveal-modal">&#215;</a>
			<input type="button" class="button radius right" value="Update" id="update-customer-data"/>

		</div>

		<!-- foundation 5 DELETE modal -->
		<div id="delete-modal" class="reveal-modal small" data-reveal>
			<h2>Edit</h2>
			<p class="lead">
				DELETE Customer Details
			</p>
			<p id="delete-modal-body">
				Are You sure you want to delete?
			</p>
			<a class="close-reveal-modal">&#215;</a>
			<input type="button" class="button alert radius right" value="Delete" id="delete-customer-data"/>
		</div>
		<script>
		jQuery(document).ready(function(){
			var dataObj = {
				url : "dataSocket.php",
				type : "get",
				cache : false,
				data : {},
				dataType : "json"
			};
			fetchData(dataObj, function(data) {
				renderTableData(data, "#jsontotable");
			});

			/*
			 $.get("dataSocket.php", {}, function(data) {

			 });
			 */

			$("#edit-row").click(function() {

				//how to fetch the selected row??

				var element = $("tr.success");
				var selectedRow = $("table").find("tr.success>td").toArray();

				var rowData = [];
				$.each(selectedRow, function(ket, dataArr) {
					rowData.push($(dataArr).html());
				});
				//console.log(rowData);
				editTableDataUI(rowData);
			});

			$('#delete-row').click(function() {
				var element = $("tr.success");
				var selectedRow = $("table").find("tr.success>td").toArray();
				var rowData = [];
				$.each(selectedRow, function(ket, dataArr) {
					rowData.push($(dataArr).html());
				});

				deleteTableDataUI(rowData);

			});

			$("#edit-modal").delegate("#update-customer-data", "click", function() {

				window.alert("clicked");
				var form = $("#customer-data").serializeArray();
				//updateData(form);
			});

			//cell data
			$("table").on("click", "td", function() {

				var cellData = table.cell(this).data();

			});

			function renderTableData(jsonData, element) {
				$.jsontotable(jsonData, {
					id : element,
					className : "table table-bordered table-condensed"
				});
				var table = $('div#jsontotable>table').DataTable({
					responsive : true
				});
				//row data
				$("table").on("click", "tr", function() {

					$("table").find("tr").removeClass("success");

					$(this).addClass("success");

					var rowData = table.row(this).data();
					var rowIndex = table.row(this).index();

					//console.log(rowData);
					//console.log(rowIndex+1);
				});
			}

			function editTableDataUI(rowData) {

				$("#edit-modal").foundation('reveal', 'open');
				var companyname = rowData[0];
				var contactName = rowData[1];
				var contactTitle = rowData[2];
				var address = rowData[3];
				var city = rowData[4];

				$("#cname").val(companyname);
				$("#conname").val(contactName);
				$("#ctitle").val(contactTitle);
				$("#add").val(address);
				$("#city").val(city);

				// $.post("update.php",{rowData:rowData},function(data){
				//
				// });

			}
			function updateData(form) {
				var fields = [];
				var keys = [];

				jQuery.each(form, function(i, field) {

					fields.push(field.value);
					keys.push(field.name);
				});
				var postObject = _.object(keys, fields);
				$.post("update.php", {
					formData : postObject
				}, function(data) {
					console.log(data);
				});
			}
			function deleteTableDataUI(rowData) {

				var message = "Are you sure you want to delete?" + rowData[1];
				alertify.confirm(message).set('onok', function() {
					console.log(rowData);
				});
				//$("#delete-modal").foundation("reveal","open");
				//$("#delete-modal-body").append("<p>"+rowData[1]+"</p>");
			}
			function deleteRow() {

			}

			fetchData({
				flag : "all"
			}, function(data) {

				//action the return data

			});
			function fetchData($Obj, returnAction) {
				$.ajax({
					url : $Obj.url,
					cache : $Obj.cache,
					type : $Obj.type,
					dataType : $Obj.dataType,
					data : $Obj.data,
					success : function(data) {

					},
					xhrFields : {
						onprogress : function(e) {
							if (e.lengthComputable) {
								console.log(e.loaded / e.total * 100 + '%');
							}
						}
					},
					success : function(data) {
						returnAction(data);
					}
				});
			}
			
			/*
			 $.ajax({
			 url : path,
			 xhrFields : {
			 onprogress : function(e) {
			 if (e.lengthComputable) {
			 console.log(e.loaded / e.total * 100 + '%');
			 }
			 }
			 },
			 success : function(response) {

			 }
			 }).progress(function(e) {
			 if (e.lengthComputable) {
			 console.log(e.loaded / e.total * 100 + '%');
			 }
			 });

			 *
			 *
			 * $.ajax({
			 url: path,
			 xhrFields: {
			 onprogress: function (e) {
			 if (e.lengthComputable) {
			 console.log(e.loaded / e.total * 100 + '%');
			 }
			 }
			 },
			 success: function (response) {

			 }
			 });*/
});
		</script>

	</body>

</html>