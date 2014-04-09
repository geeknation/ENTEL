var EntelUI = {
	"openModal" : function($titletext,$server) {
		var $sflag="create-programmer";
		$("#UImodal").modal('show');
		$(".modal-title").text($titletext);
		var UI=EntelUI.fetchUI($sflag,"GET",$server,"html");
		$(".modal-body").html(UI);
		
	},

	"fetchUI" : function($data,$method, $server, $datatype) {
		var flag={
			"flag":$data
		};
		$.ajax({
			cache : false,
			url : $server,
			type : $method,
			data:$data,
			beforeSend : function() {
			},
			complete : function() {
			},
			success : function(data) {
				return data;
			}
		});
	},
	"fetchData" : function($data, $method, $server, $datatype) {
		$Sdata = '';
		$.ajax({
			cache : false,
			url : $server,
			dataType : $datatype,
			data : $data,
			type : $method,
			beforeSend : function() {

			},
			complete : function() {

			},
			success : function(Sdata) {
				$Sdata = Sdata;
			}
		});
	}
};
