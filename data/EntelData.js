var EntelData = {

	"renderTableData" : function(jsonData, element) {
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
	},
	"editTableDataUI" : function(rowData) {

		var companyname = rowData[0];
		var contactName = rowData[1];
		var contactTitle = rowData[2];
		var address = rowData[3];
		var city = rowData[4];
		$("#edit-modal").foundation('reveal', 'open');
		$("#cname").val(companyname);
		$("#conname").val(contactName);
		$("#ctitle").val(contactTitle);
		$("#add").val(address);
		$("#city").val(city);

		// $.post("update.php",{rowData:rowData},function(data){
		//
		// });

	},
	"updateData" : function(form) {
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
	},
	"deleteTableDataUI" : function(rowData) {
		var message = "Are you sure you want to delete?" + rowData[1];
		alertify.confirm(message).set('onok', function() {
			console.log(rowData);
		});
		//$("#delete-modal").foundation("reveal","open");
		//$("#delete-modal-body").append("<p>"+rowData[1]+"</p>");
	},
	
	"deleteRow" : function() {
		
		
	},
	"fetchData" : function($Obj, returnAction) {
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
}; 